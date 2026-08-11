package main

import (
	"context"
	"fmt"
	"log"
	"os"
	"path/filepath"
	"strings"
	"time"

	"mysql-backup/internal/backup"
	"mysql-backup/internal/config"
	"mysql-backup/internal/notification"
	"mysql-backup/internal/storage"

	"github.com/robfig/cron/v3"
)

var logger *log.Logger

func initLogger(logPath string) {
	if logPath == "" {
		logger = log.New(os.Stdout, "", log.LstdFlags)
		return
	}
	// Ensure parent directory of log file exists
	if err := os.MkdirAll(filepath.Dir(logPath), 0755); err != nil {
		fmt.Printf("⚠️ Could not create directory for log file %s: %v. Logging to stdout.\n", logPath, err)
		logger = log.New(os.Stdout, "", log.LstdFlags)
		return
	}
	logFile, err := os.OpenFile(logPath, os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
	if err != nil {
		fmt.Printf("⚠️ Could not open log file %s: %v. Logging to stdout.\n", logPath, err)
		logger = log.New(os.Stdout, "", log.LstdFlags)
		return
	}
	logger = log.New(logFile, "", log.LstdFlags)
}

func runBackup(cfg *config.Config, runner backup.Runner, storages []storage.Storage, notifiers []notification.Notifier) {
	logger.Println("Starting scheduled database backup process...")
	ctx, cancel := context.WithTimeout(context.Background(), 2*time.Hour)
	defer cancel()

	if len(storages) == 0 {
		errStr := "No active storage destinations configured"
		logger.Printf("ERROR: %s", errStr)
		sendNotification(ctx, notifiers, fmt.Sprintf("⚠️ Database Backup Failed: %s", errStr))
		return
	}

	// Create a secure temporary staging directory for building the archives
	stagingDir, err := os.MkdirTemp("", "backup-agent-staging-*")
	if err != nil {
		errStr := fmt.Sprintf("failed to create temporary staging directory: %v", err)
		logger.Printf("ERROR: %s", errStr)
		sendNotification(ctx, notifiers, fmt.Sprintf("⚠️ Database Backup Failed: %s", errStr))
		return
	}
	defer os.RemoveAll(stagingDir)

	var backupErrors []string
	var backupFiles []string
	dateFolder := time.Now().Format("2006-01-02")

	for _, db := range cfg.DBNames {
		logger.Printf("Backing up database: %s", db)
		localArchive, err := runner.Backup(ctx, db, stagingDir)
		if err != nil {
			errStr := fmt.Sprintf("Database %s failed: %v", db, err)
			logger.Printf("ERROR: %s", errStr)
			backupErrors = append(backupErrors, errStr)
			continue
		}

		fileName := filepath.Base(localArchive)
		destRelativePath := filepath.Join(dateFolder, fileName)

		// Upload to all enabled storage backends
		for _, store := range storages {
			logger.Printf("Saving %s backup to storage [%s]...", db, store.Type())
			if err := store.Save(ctx, localArchive, destRelativePath); err != nil {
				errStr := fmt.Sprintf("Failed to save %s to %s: %v", db, store.Type(), err)
				logger.Printf("ERROR: %s", errStr)
				backupErrors = append(backupErrors, errStr)
			}
		}

		backupFiles = append(backupFiles, fileName)
	}

	// Clean up old backups in all storages
	if cfg.RemoveOld {
		logger.Println("Running retention policy cleanup...")
		for _, store := range storages {
			logger.Printf("Cleaning old backups in storage [%s]...", store.Type())
			if err := store.Cleanup(ctx, cfg.Days, cfg.Months); err != nil {
				errStr := fmt.Sprintf("Storage [%s] cleanup failed: %v", store.Type(), err)
				logger.Printf("ERROR: %s", errStr)
				backupErrors = append(backupErrors, errStr)
			}
		}
	}

	// Formulate status message
	timestamp := time.Now().Format(cfg.LogTimeFormat)
	var msg string

	if len(backupErrors) > 0 {
		msg = fmt.Sprintf("⚠️ %s Database Backup completed with errors:\n\n%s", timestamp, strings.Join(backupErrors, "\n"))
	} else {
		storageList := []string{}
		for _, s := range storages {
			storageList = append(storageList, s.Type())
		}
		msg = fmt.Sprintf("✅ %s Database Backup completed successfully.\n\nStorages used: %s\nFiles backed up:\n- %s",
			timestamp,
			strings.Join(storageList, ", "),
			strings.Join(backupFiles, "\n- "),
		)
	}

	logger.Println(msg)
	sendNotification(ctx, notifiers, msg)
}

func sendNotification(ctx context.Context, notifiers []notification.Notifier, msg string) {
	for _, n := range notifiers {
		if err := n.Send(ctx, msg); err != nil {
			logger.Printf("ERROR: Notification failed: %v", err)
		}
	}
}

func main() {
	cfg := config.LoadConfig()
	initLogger(cfg.LogFile)

	logger.Println("Backup Agent starting...")

	// Verify scheduler setup
	if cfg.BackupSchedule == "" {
		logger.Fatal("BACKUP_SCHEDULE is not configured in .env file")
	}

	// Initialize the requested backup runner (mydumper)
	runner := backup.NewMydumperRunner(cfg)

	// Initialize active storage destinations
	var storages []storage.Storage

	if cfg.LocalEnabled {
		if cfg.LocalDir == "" {
			logger.Fatal("LOCAL_DIR must be specified when local storage is enabled")
		}
		storages = append(storages, storage.NewDirectoryStorage("local", cfg.LocalDir))
		logger.Printf("Initialized Local storage: %s", cfg.LocalDir)
	}

	if cfg.NfsEnabled {
		if cfg.NfsDir == "" {
			logger.Fatal("NFS_DIR must be specified when NFS storage is enabled")
		}
		storages = append(storages, storage.NewDirectoryStorage("nfs", cfg.NfsDir))
		logger.Printf("Initialized NFS storage: %s", cfg.NfsDir)
	}

	if cfg.S3Enabled {
		s3Store, err := storage.NewS3Storage(
			cfg.S3Bucket,
			cfg.S3Region,
			cfg.S3Endpoint,
			cfg.S3AccessKey,
			cfg.S3SecretKey,
			cfg.S3ForcePathStyle,
		)
		if err != nil {
			logger.Fatalf("Failed to initialize S3 storage: %v", err)
		}
		storages = append(storages, s3Store)
		logger.Printf("Initialized S3 storage bucket: %s", cfg.S3Bucket)
	}

	// Initialize notification systems
	var notifiers []notification.Notifier

	if cfg.Telegram {
		notifiers = append(notifiers, notification.NewTelegramNotifier(cfg.BotToken, cfg.ChatID))
		logger.Println("Notification enabled: Telegram")
	}

	if cfg.Lark {
		notifiers = append(notifiers, notification.NewLarkNotifier(cfg.LarkUrl, cfg.LarkMessageTitle))
		logger.Println("Notification enabled: Lark")
	}

	if cfg.Mail {
		notifiers = append(notifiers, notification.NewEmailNotifier(
			cfg.SmtpHost,
			cfg.SmtpPort,
			cfg.SmtpUser,
			cfg.SmtpPass,
			cfg.MailSubject,
			cfg.Emails,
		))
		logger.Println("Notification enabled: Email")
	}

	// Setup and start cron job scheduler
	c := cron.New()
	_, err := c.AddFunc(cfg.BackupSchedule, func() {
		runBackup(cfg, runner, storages, notifiers)
	})
	if err != nil {
		logger.Fatalf("Error setting up backup schedule: %v", err)
	}

	logger.Printf("Scheduler started with cron plan: \"%s\"", cfg.BackupSchedule)
	c.Start()

	// Block main goroutine to keep the agent daemon alive
	select {}
}
