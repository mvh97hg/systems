package main

import (
	"fmt"
	"log"
	"strings"
	"time"

	"github.com/joho/godotenv"
	"github.com/robfig/cron/v3"
)

func runBackup(cfg *Config) {
	BackupFiles, errors := BackupDatabases(cfg)
	CleanupOldBackups(cfg)

	timestamp := time.Now().Format(cfg.LogTimeFormat)

	for _, file := range BackupFiles {
		fmt.Println(file)
	}

	if len(errors) > 0 {
		msg := fmt.Sprintf("⚠️ %s Database Backup errors:\n\n%s", timestamp, strings.Join(errors, "\n"))
		SendTelegram(cfg, msg)
		SendLarkSuite(cfg, msg)
		SendMail(cfg, msg)
	} else {
		msg := fmt.Sprintf("✅ %s Database Backup completed successfully.\n%s", timestamp, strings.Join(BackupFiles, "\n"))
		SendTelegram(cfg, msg)
		SendLarkSuite(cfg, msg)
		SendMail(cfg, msg)
	}
}

func main() {
	if err := godotenv.Load(); err != nil {
		log.Fatal("Không thể load file .env")
	}
	cfg := LoadConfig()
	InitLogger(cfg.LogFile)

	if cfg.BackupSchedule == "" {
		log.Fatal("Chưa cấu hình BACKUP_SCHEDULE trong .env")
	}

	c := cron.New() // Nếu cần dùng giây (format 6 trường)
	_, err := c.AddFunc(cfg.BackupSchedule, func() {
		runBackup(cfg)
	})
	if err != nil {
		log.Fatalf("Lỗi cấu hình lịch backup: %v", err)
	}

	log.Printf("Bắt đầu backup theo lịch: \"%s\"\n", cfg.BackupSchedule)
	c.Start()

	// Giữ chương trình luôn chạy
	select {}

}
