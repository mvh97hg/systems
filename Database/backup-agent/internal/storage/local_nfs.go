package storage

import (
	"context"
	"fmt"
	"io"
	"os"
	"path/filepath"
	"sort"
	"time"
)

type DirectoryStorage struct {
	storageType string
	rootDir     string
}

func NewDirectoryStorage(storageType, rootDir string) *DirectoryStorage {
	return &DirectoryStorage{
		storageType: storageType,
		rootDir:     rootDir,
	}
}

func (d *DirectoryStorage) Type() string {
	return d.storageType
}

func (d *DirectoryStorage) Save(ctx context.Context, localFilePath, destRelativePath string) error {
	destPath := filepath.Join(d.rootDir, destRelativePath)
	destDir := filepath.Dir(destPath)

	// Tạo thư mục đích nếu chưa tồn tại
	if err := os.MkdirAll(destDir, 0755); err != nil {
		return fmt.Errorf("failed to create destination directory: %w", err)
	}

	srcFile, err := os.Open(localFilePath)
	if err != nil {
		return fmt.Errorf("failed to open source file: %w", err)
	}
	defer srcFile.Close()

	destFile, err := os.OpenFile(destPath, os.O_WRONLY|os.O_CREATE|os.O_TRUNC, 0644)
	if err != nil {
		return fmt.Errorf("failed to create/open destination file: %w", err)
	}
	defer destFile.Close()

	// Sử dụng io.CopyBuffer hoặc kiểm tra context định kỳ
	// Để đơn giản và nhanh, dùng io.Copy. Vì chạy nội bộ local disk/NFS nên tốc độ rất nhanh.
	_, err = io.Copy(destFile, srcFile)
	if err != nil {
		return fmt.Errorf("failed to copy file: %w", err)
	}

	return nil
}

func (d *DirectoryStorage) Cleanup(ctx context.Context, days, months int) error {
	entries, err := os.ReadDir(d.rootDir)
	if err != nil {
		if os.IsNotExist(err) {
			return nil // Thư mục chưa được tạo, không cần dọn dẹp
		}
		return fmt.Errorf("failed to read root directory: %w", err)
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
			continue // Bỏ qua thư mục không có định dạng ngày YYYY-MM-DD
		}

		isMonthly := dirDate.Day() == 1
		backups = append(backups, backupEntry{
			entry:     entry,
			date:      dirDate,
			isMonthly: isMonthly,
		})
	}

	now := time.Now()
	dailyCutoff := now.AddDate(0, 0, -days)
	monthlyCutoff := now.AddDate(0, -months, 0)

	// Tách backup tháng và ngày
	var monthlyBackups, dailyBackups []backupEntry
	for _, b := range backups {
		if b.isMonthly {
			monthlyBackups = append(monthlyBackups, b)
		} else {
			dailyBackups = append(dailyBackups, b)
		}
	}

	// Sắp xếp giảm dần theo ngày (mới nhất lên đầu)
	sort.Slice(monthlyBackups, func(i, j int) bool {
		return monthlyBackups[i].date.After(monthlyBackups[j].date)
	})
	sort.Slice(dailyBackups, func(i, j int) bool {
		return dailyBackups[i].date.After(dailyBackups[j].date)
	})

	// Xóa monthly backups cũ vượt quá số lượng và ngày giới hạn
	for i, b := range monthlyBackups {
		if i < months {
			continue
		}
		if b.date.Before(monthlyCutoff) {
			fullPath := filepath.Join(d.rootDir, b.entry.Name())
			if err := os.RemoveAll(fullPath); err != nil {
				return fmt.Errorf("failed to remove old monthly backup folder %s: %w", fullPath, err)
			}
		}
	}

	// Xóa daily backups cũ vượt quá số lượng và ngày giới hạn
	for i, b := range dailyBackups {
		if i < days {
			continue
		}
		if b.date.Before(dailyCutoff) {
			fullPath := filepath.Join(d.rootDir, b.entry.Name())
			if err := os.RemoveAll(fullPath); err != nil {
				return fmt.Errorf("failed to remove old daily backup folder %s: %w", fullPath, err)
			}
		}
	}

	return nil
}
