package backup

import (
	"archive/tar"
	"compress/gzip"
	"fmt"
	"io"
	"os"
	"path/filepath"
)

// CreateTarGz programmatically compresses a directory into a .tar.gz archive.
func CreateTarGz(sourceDir, targetFilePath string) error {
	// Create destination file
	outFile, err := os.Create(targetFilePath)
	if err != nil {
		return fmt.Errorf("failed to create target archive: %w", err)
	}
	defer outFile.Close()

	// Create gzip writer
	gw := gzip.NewWriter(outFile)
	defer gw.Close()

	// Create tar writer
	tw := tar.NewWriter(gw)
	defer tw.Close()

	// Ensure the source directory path uses clean slash separation
	sourceDir = filepath.Clean(sourceDir)

	err = filepath.Walk(sourceDir, func(path string, info os.FileInfo, err error) error {
		if err != nil {
			return err
		}

		// Generate tar header from file info
		header, err := tar.FileInfoHeader(info, info.Name())
		if err != nil {
			return fmt.Errorf("failed to generate tar header for %s: %w", path, err)
		}

		// Keep relative path structure inside the archive
		relPath, err := filepath.Rel(sourceDir, path)
		if err != nil {
			return fmt.Errorf("failed to determine relative path for %s: %w", path, err)
		}
		
		// Convert path separators to forward slashes for cross-platform archive compatibility
		relPath = filepath.ToSlash(relPath)
		if relPath == "." {
			return nil // Skip source directory root itself
		}

		header.Name = relPath

		// Write header
		if err := tw.WriteHeader(header); err != nil {
			return fmt.Errorf("failed to write tar header for %s: %w", path, err)
		}

		// If it's a directory or symlink, we are done after writing header
		if info.Mode().IsDir() || info.Mode()&os.ModeSymlink != 0 {
			return nil
		}

		// Open and copy file content
		file, err := os.Open(path)
		if err != nil {
			return fmt.Errorf("failed to open file %s: %w", path, err)
		}
		defer file.Close()

		_, err = io.Copy(tw, file)
		if err != nil {
			return fmt.Errorf("failed to copy file contents for %s: %w", path, err)
		}

		return nil
	})

	if err != nil {
		return fmt.Errorf("failed walking directory %s: %w", sourceDir, err)
	}

	return nil
}
