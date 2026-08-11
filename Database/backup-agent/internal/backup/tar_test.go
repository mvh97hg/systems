package backup

import (
	"archive/tar"
	"compress/gzip"
	"io"
	"os"
	"path/filepath"
	"testing"
)

func TestCreateTarGz(t *testing.T) {
	// Create temp dir
	tempDir, err := os.MkdirTemp("", "tar-test-*")
	if err != nil {
		t.Fatalf("failed to create temp dir: %v", err)
	}
	defer os.RemoveAll(tempDir)

	// Create a subdirectory with a file
	subDir := filepath.Join(tempDir, "subdir")
	if err := os.Mkdir(subDir, 0755); err != nil {
		t.Fatalf("failed to create sub dir: %v", err)
	}

	filePath := filepath.Join(subDir, "test.txt")
	content := []byte("hello world")
	if err := os.WriteFile(filePath, content, 0644); err != nil {
		t.Fatalf("failed to write test file: %v", err)
	}

	// Target tar.gz path
	tarGzPath := filepath.Join(tempDir, "archive.tar.gz")

	// Compress the tempDir
	if err := CreateTarGz(tempDir, tarGzPath); err != nil {
		t.Fatalf("CreateTarGz failed: %v", err)
	}

	// Verify the archive exists and check contents
	file, err := os.Open(tarGzPath)
	if err != nil {
		t.Fatalf("failed to open archive: %v", err)
	}
	defer file.Close()

	gr, err := gzip.NewReader(file)
	if err != nil {
		t.Fatalf("failed to create gzip reader: %v", err)
	}
	defer gr.Close()

	tr := tar.NewReader(gr)

	foundFile := false
	for {
		header, err := tr.Next()
		if err == io.EOF {
			break
		}
		if err != nil {
			t.Fatalf("error reading tar header: %v", err)
		}

		// Check the relative path of the file inside the archive
		if header.Name == "subdir/test.txt" {
			foundFile = true
			data, err := io.ReadAll(tr)
			if err != nil {
				t.Fatalf("error reading file data from tar: %v", err)
			}
			if string(data) != string(content) {
				t.Errorf("expected content %q, got %q", string(content), string(data))
			}
		}
	}

	if !foundFile {
		t.Errorf("file 'subdir/test.txt' was not found in the archive")
	}
}
