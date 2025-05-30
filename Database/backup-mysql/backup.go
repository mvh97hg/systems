package main

import (
	"bytes"
	"fmt"
	"os"
	"os/exec"
	"path/filepath"
	"sort"
	"strings"
	"sync"
	"time"
)

func BackupDatabases(cfg *Config) ([]string, []string) {
	var wg sync.WaitGroup
	var mu sync.Mutex
	var errors []string
	var BackupFiles []string
	date := time.Now().Format("2006-01-02")
	backupDir := filepath.Join(cfg.BackupDir, date)
	os.MkdirAll(backupDir, 0755)

	sem := make(chan struct{}, cfg.MaxConcurrentBackups)

	for _, db := range cfg.DBNames {
		wg.Add(1)
		sem <- struct{}{} // chặn nếu đạt giới hạn thread
		go func(database string) {
			defer wg.Done()
			defer func() { <-sem }()

			filePath, err := BackupDatabase(cfg, database, backupDir)

			if err != nil {
				mu.Lock()
				errors = append(errors, err.Error())
				mu.Unlock()
			}

			BackupFiles = append(BackupFiles, filePath)

		}(db)
	}

	wg.Wait()
	fmt.Println("✅ Backup process completed.")
	return BackupFiles, errors
}

func BackupDatabase(cfg *Config, database, dir string) (string, error) {
	timestamp := time.Now().Format("20060102-150405")
	filename := fmt.Sprintf("%s-%s-%s.sql", cfg.DBHost, database, timestamp)
	outputFile := filepath.Join(dir, filename)

	args := []string{
		"-h", cfg.DBHost,
		"-P", cfg.DBPort,
		"-u", cfg.DBUser,
		fmt.Sprintf("-p%s", cfg.DBPass),
	}
	args = append(args, cfg.DBOptions...)
	args = append(args, database)

	// Include tables (if match mode is 'include')
	if cfg.DBTablesMatch == "include" && len(cfg.DBTables) > 0 {
		for _, table := range cfg.DBTables {
			if strings.HasPrefix(table, database+".") {
				args = append(args, strings.TrimPrefix(table, database+"."))
			}
		}
	}

	cmd := exec.Command("mysqldump", args...)

	outFile, err := os.Create(outputFile)
	if err != nil {
		logger.Printf("ERROR: Error creating file for %s: %v", database, err)
		return "", fmt.Errorf("%s Error creating file for %s: %v", time.Now().Format(cfg.LogTimeFormat), database, err)
	}
	defer outFile.Close()

	var stderr bytes.Buffer
	cmd.Stdout = outFile
	cmd.Stderr = &stderr

	if err := cmd.Run(); err != nil {
		logger.Printf("ERROR: Backup failed for %s: %v | %s", database, err, stderr.String())
		return "", fmt.Errorf("%s Backup failed for %s: %v | %s", time.Now().Format(cfg.LogTimeFormat), database, err, stderr.String())
	}

	// Compress
	comp := exec.Command(cfg.CompressionCmd, outputFile)
	if err := comp.Run(); err != nil {
		logger.Printf("ERROR: Compression failed for %s: %v", outputFile, err)
		return "", fmt.Errorf("%s Compression failed for %s: %v", time.Now().Format(cfg.LogTimeFormat), outputFile, err)
	}

	logger.Printf("✅ Backup successful: %s", outputFile+"."+cfg.CompressionExt)
	return outputFile + "." + cfg.CompressionExt, nil
}

func CleanupOldBackups(cfg *Config) {
	if !cfg.RemoveOld {
		return
	}

	entries, err := os.ReadDir(cfg.BackupDir)
	if err != nil {
		logger.Printf("ERROR: %v", err)
		return
	}

	type backupEntry struct {
		entry     os.DirEntry
		date      time.Time
		isMonthly bool
	}

	var backups []backupEntry

	for _, entry := range entries {
		if !entry.IsDir() {
			continue
		}
		dirDate, err := time.Parse("2006-01-02", entry.Name())
		if err != nil {
			continue // skip folder không đúng định dạng ngày
		}

		isMonthly := dirDate.Day() == 1
		backups = append(backups, backupEntry{
			entry:     entry,
			date:      dirDate,
			isMonthly: isMonthly,
		})
	}

	now := time.Now()
	dailyCutoff := now.AddDate(0, 0, -cfg.Days)
	monthlyCutoff := now.AddDate(0, -cfg.Months, 0)

	// Tách riêng backup tháng và ngày
	var monthlyBackups, dailyBackups []backupEntry
	for _, b := range backups {
		if b.isMonthly {
			monthlyBackups = append(monthlyBackups, b)
		} else {
			dailyBackups = append(dailyBackups, b)
		}
	}

	// Hàm sắp xếp giảm dần theo ngày
	sort.Slice(monthlyBackups, func(i, j int) bool {
		return monthlyBackups[i].date.After(monthlyBackups[j].date)
	})
	sort.Slice(dailyBackups, func(i, j int) bool {
		return dailyBackups[i].date.After(dailyBackups[j].date)
	})

	// Xóa monthly backups vượt quá số lượng và cũ hơn cutoff
	for i, b := range monthlyBackups {
		if i < cfg.Months {
			continue
		}
		if b.date.Before(monthlyCutoff) {
			fullPath := filepath.Join(cfg.BackupDir, b.entry.Name())
			logger.Printf("Deleting old monthly backup: %s", fullPath)
			os.RemoveAll(fullPath)
		}
	}

	// Xóa daily backups vượt quá số lượng và cũ hơn cutoff
	for i, b := range dailyBackups {
		if i < cfg.Days {
			continue
		}
		if b.date.Before(dailyCutoff) {
			fullPath := filepath.Join(cfg.BackupDir, b.entry.Name())
			logger.Printf("Deleting old daily backup: %s", fullPath)
			os.RemoveAll(fullPath)
		}
	}
}
