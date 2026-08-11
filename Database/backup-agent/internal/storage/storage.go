package storage

import "context"

type Storage interface {
	Type() string
	Save(ctx context.Context, localFilePath, destRelativePath string) error
	Cleanup(ctx context.Context, days, months int) error
}
