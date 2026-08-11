package storage

import (
	"context"
	"fmt"
	"os"
	"path/filepath"
	"sort"
	"strings"
	"time"

	"github.com/aws/aws-sdk-go-v2/aws"
	"github.com/aws/aws-sdk-go-v2/config"
	"github.com/aws/aws-sdk-go-v2/credentials"
	"github.com/aws/aws-sdk-go-v2/service/s3"
	"github.com/aws/aws-sdk-go-v2/service/s3/types"
)

type S3Storage struct {
	client *s3.Client
	bucket string
}

func NewS3Storage(bucket, region, endpoint, accessKey, secretKey string, forcePathStyle bool) (*S3Storage, error) {
	ctx := context.TODO()

	cfg, err := config.LoadDefaultConfig(ctx,
		config.WithRegion(region),
		config.WithCredentialsProvider(credentials.NewStaticCredentialsProvider(accessKey, secretKey, "")),
	)
	if err != nil {
		return nil, fmt.Errorf("unable to load AWS SDK config: %w", err)
	}

	client := s3.NewFromConfig(cfg, func(o *s3.Options) {
		if endpoint != "" {
			o.BaseEndpoint = aws.String(endpoint)
		}
		o.UsePathStyle = forcePathStyle
	})

	return &S3Storage{
		client: client,
		bucket: bucket,
	}, nil
}

func (s *S3Storage) Type() string {
	return "s3"
}

func (s *S3Storage) Save(ctx context.Context, localFilePath, destRelativePath string) error {
	file, err := os.Open(localFilePath)
	if err != nil {
		return fmt.Errorf("failed to open local backup file: %w", err)
	}
	defer file.Close()

	// S3 keys must use forward slashes even on Windows
	s3Key := filepath.ToSlash(destRelativePath)

	_, err = s.client.PutObject(ctx, &s3.PutObjectInput{
		Bucket: aws.String(s.bucket),
		Key:    aws.String(s3Key),
		Body:   file,
	})
	if err != nil {
		return fmt.Errorf("failed to upload object to S3: %w", err)
	}

	return nil
}

func (s *S3Storage) Cleanup(ctx context.Context, days, months int) error {
	var objects []types.Object
	paginator := s3.NewListObjectsV2Paginator(s.client, &s3.ListObjectsV2Input{
		Bucket: aws.String(s.bucket),
	})

	for paginator.HasMorePages() {
		page, err := paginator.NextPage(ctx)
		if err != nil {
			return fmt.Errorf("failed to list S3 objects: %w", err)
		}
		objects = append(objects, page.Contents...)
	}

	// Map to group object identifiers by YYYY-MM-DD prefix
	objectsByDate := make(map[string][]types.ObjectIdentifier)

	for _, obj := range objects {
		key := aws.ToString(obj.Key)
		parts := strings.Split(key, "/")
		if len(parts) < 2 {
			continue // Key does not contain a prefix path
		}
		dateStr := parts[0]
		_, err := time.Parse("2006-01-02", dateStr)
		if err != nil {
			continue // Prefix is not a valid YYYY-MM-DD date
		}

		objectsByDate[dateStr] = append(objectsByDate[dateStr], types.ObjectIdentifier{
			Key: obj.Key,
		})
	}

	type dateEntry struct {
		dateStr   string
		date      time.Time
		isMonthly bool
	}

	var dates []dateEntry
	for dateStr := range objectsByDate {
		d, err := time.Parse("2006-01-02", dateStr)
		if err != nil {
			continue
		}
		dates = append(dates, dateEntry{
			dateStr:   dateStr,
			date:      d,
			isMonthly: d.Day() == 1,
		})
	}

	now := time.Now()
	dailyCutoff := now.AddDate(0, 0, -days)
	monthlyCutoff := now.AddDate(0, -months, 0)

	var monthlyDates, dailyDates []dateEntry
	for _, d := range dates {
		if d.isMonthly {
			monthlyDates = append(monthlyDates, d)
		} else {
			dailyDates = append(dailyDates, d)
		}
	}

	sort.Slice(monthlyDates, func(i, j int) bool {
		return monthlyDates[i].date.After(monthlyDates[j].date)
	})
	sort.Slice(dailyDates, func(i, j int) bool {
		return dailyDates[i].date.After(dailyDates[j].date)
	})

	var datesToDelete []string

	// Monthly retention
	for i, d := range monthlyDates {
		if i < months {
			continue
		}
		if d.date.Before(monthlyCutoff) {
			datesToDelete = append(datesToDelete, d.dateStr)
		}
	}

	// Daily retention
	for i, d := range dailyDates {
		if i < days {
			continue
		}
		if d.date.Before(dailyCutoff) {
			datesToDelete = append(datesToDelete, d.dateStr)
		}
	}

	if len(datesToDelete) == 0 {
		return nil
	}

	// Gather all S3 keys to delete
	var keysToDelete []types.ObjectIdentifier
	for _, dateStr := range datesToDelete {
		keysToDelete = append(keysToDelete, objectsByDate[dateStr]...)
	}

	// S3 DeleteObjects accepts at most 1000 objects per call
	for len(keysToDelete) > 0 {
		batchSize := 1000
		if len(keysToDelete) < batchSize {
			batchSize = len(keysToDelete)
		}
		batch := keysToDelete[:batchSize]
		keysToDelete = keysToDelete[batchSize:]

		_, err := s.client.DeleteObjects(ctx, &s3.DeleteObjectsInput{
			Bucket: aws.String(s.bucket),
			Delete: &types.Delete{
				Objects: batch,
				Quiet:   aws.Bool(true),
			},
		})
		if err != nil {
			return fmt.Errorf("failed to delete batch of S3 objects: %w", err)
		}
	}

	return nil
}
