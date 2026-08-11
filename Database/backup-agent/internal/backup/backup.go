package backup

import (
	"bytes"
	"context"
	"fmt"
	"os"
	"os/exec"
	"path/filepath"
	"strings"
	"time"

	"mysql-backup/internal/config"
)

type Runner interface {
	Backup(ctx context.Context, database string, stagingDir string) (string, error)
}

type MydumperRunner struct {
	cfg *config.Config
}

func NewMydumperRunner(cfg *config.Config) *MydumperRunner {
	return &MydumperRunner{cfg: cfg}
}

func (m *MydumperRunner) Backup(ctx context.Context, database string, stagingDir string) (string, error) {
	// 1. Create a unique database temp dump directory inside stagingDir
	timestamp := time.Now().Format("20060102-150405")
	tempDumpDir := filepath.Join(stagingDir, fmt.Sprintf("%s-%s-mydumper-temp", database, timestamp))
	if err := os.MkdirAll(tempDumpDir, 0755); err != nil {
		return "", fmt.Errorf("failed to create temp dump directory: %w", err)
	}
	defer os.RemoveAll(tempDumpDir) // Ensure temporary files are cleaned up afterwards

	// 2. Prepare mydumper arguments
	args := []string{
		"-h", m.cfg.DBHost,
		"-P", m.cfg.DBPort,
		"-u", m.cfg.DBUser,
		"-p", m.cfg.DBPass,
		"-B", database,
		"-o", tempDumpDir,
		"-t", fmt.Sprintf("%d", m.cfg.MydumperThreads),
		"-c", // Enable compression of .sql files natively in mydumper
	}

	// Include custom mydumper options if specified
	if len(m.cfg.MydumperOptions) > 0 {
		args = append(args, m.cfg.MydumperOptions...)
	}

	// Include tables if configured
	if m.cfg.DBTablesMatch == "include" && len(m.cfg.DBTables) > 0 {
		var tablesForDb []string
		for _, table := range m.cfg.DBTables {
			if strings.HasPrefix(table, database+".") {
				tablesForDb = append(tablesForDb, strings.TrimPrefix(table, database+"."))
			}
		}
		if len(tablesForDb) > 0 {
			// mydumper has a -T (--tables-list) option: comma-separated list of tables
			args = append(args, "-T", strings.Join(tablesForDb, ","))
		}
	}

	// 3. Execute mydumper
	cmd := exec.CommandContext(ctx, m.cfg.MydumperCmd, args...)
	var stderr bytes.Buffer
	cmd.Stderr = &stderr

	if err := cmd.Run(); err != nil {
		return "", fmt.Errorf("mydumper failed for %s: %v | stderr: %s", database, err, stderr.String())
	}

	// 4. Archive tempDumpDir into tar.gz
	archiveName := fmt.Sprintf("%s-%s-%s.tar.gz", m.cfg.DBHost, database, timestamp)
	archivePath := filepath.Join(stagingDir, archiveName)

	if err := CreateTarGz(tempDumpDir, archivePath); err != nil {
		return "", fmt.Errorf("failed to create archive: %w", err)
	}

	return archivePath, nil
}
