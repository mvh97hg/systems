package config

import (
	"fmt"
	"log"
	"os"
	"strconv"
	"strings"

	"github.com/joho/godotenv"
)

type Config struct {
	BackupSchedule string
	DBNames        []string
	DBUser         string
	DBPass         string
	DBHost         string
	DBPort         string
	DBTables       []string
	DBTablesMatch  string
	DBOptions      []string

	LogFile       string
	LogTimeFormat string

	MydumperCmd     string
	MydumperThreads int
	MydumperOptions []string

	RemoveOld bool
	Days      int
	Months    int

	// Storage configuration
	LocalEnabled bool
	LocalDir     string

	NfsEnabled bool
	NfsDir     string

	S3Enabled        bool
	S3Bucket         string
	S3Region         string
	S3Endpoint       string
	S3AccessKey      string
	S3SecretKey      string
	S3ForcePathStyle bool

	// Notification configuration
	Telegram bool
	BotToken string
	ChatID   string

	Lark             bool
	LarkUrl          string
	LarkMessageTitle string

	Mail        bool
	SmtpHost    string
	SmtpPort    int
	SmtpUser    string
	SmtpPass    string
	MailSubject string
	Emails      string
}

func LoadConfig() *Config {
	// Tải file .env từ thư mục hiện tại
	if err := godotenv.Load(); err != nil {
		log.Println("Warning: Can't load .env file, will read from environment variables")
	}

	mydumperThreads, err := strconv.Atoi(os.Getenv("MYDUMPER_THREADS"))
	if err != nil || mydumperThreads < 1 {
		mydumperThreads = 4 // fallback mặc định
	}

	return &Config{
		BackupSchedule: os.Getenv("BACKUP_SCHEDULE"),
		DBNames:        strings.Fields(os.Getenv("DBNAMES")),
		DBUser:         os.Getenv("DBUSER"),
		DBPass:         os.Getenv("DBPASS"),
		DBHost:         os.Getenv("DBHOST"),
		DBPort:         os.Getenv("DBPORT"),
		DBTables:       strings.Fields(os.Getenv("DBTABLES")),
		DBTablesMatch:  os.Getenv("DBTABLESMATCH"),
		DBOptions:      strings.Fields(os.Getenv("DBOPTIONS")),

		LogFile:       os.Getenv("LOGFILE"),
		LogTimeFormat: getEnv("LOG_TIME_FORMAT", "02/01/2006 15:04:05"),

		MydumperCmd:     getEnv("MYDUMPER_CMD", "mydumper"),
		MydumperThreads: mydumperThreads,
		MydumperOptions: strings.Fields(os.Getenv("MYDUMPER_OPTIONS")),

		RemoveOld: os.Getenv("DELETE") == "y",
		Days:      parseEnvInt("DAYS", 7),
		Months:    parseEnvInt("MONTHS", 3),

		LocalEnabled: os.Getenv("LOCAL_ENABLED") == "y",
		LocalDir:     os.Getenv("LOCAL_DIR"),

		NfsEnabled: os.Getenv("NFS_ENABLED") == "y",
		NfsDir:     os.Getenv("NFS_DIR"),

		S3Enabled:        os.Getenv("S3_ENABLED") == "y",
		S3Bucket:         os.Getenv("S3_BUCKET"),
		S3Region:         os.Getenv("S3_REGION"),
		S3Endpoint:       os.Getenv("S3_ENDPOINT"),
		S3AccessKey:      os.Getenv("S3_ACCESS_KEY"),
		S3SecretKey:      os.Getenv("S3_SECRET_KEY"),
		S3ForcePathStyle: os.Getenv("S3_FORCE_PATH_STYLE") == "y",

		Telegram: os.Getenv("TELEGRAM") == "y",
		BotToken: os.Getenv("BOTTOKEN"),
		ChatID:   os.Getenv("CHATID"),

		Lark:             os.Getenv("LARK") == "y",
		LarkUrl:          os.Getenv("LARK_URL"),
		LarkMessageTitle: os.Getenv("LARK_MESSAGE_TITLE"),

		Mail:        os.Getenv("MAIL") == "y",
		SmtpHost:    os.Getenv("SMTP_HOST"),
		SmtpPort:    parseEnvInt("SMTP_PORT", 587),
		SmtpUser:    os.Getenv("SMTP_USER"),
		SmtpPass:    os.Getenv("SMTP_PASS"),
		MailSubject: os.Getenv("MAIL_SUBJECT"),
		Emails:      os.Getenv("EMAILS"),
	}
}

func getEnv(key, defaultVal string) string {
	if val := os.Getenv(key); val != "" {
		return val
	}
	return defaultVal
}

func parseEnvInt(key string, defaultVal int) int {
	val := os.Getenv(key)
	if val == "" {
		return defaultVal
	}
	var i int
	_, err := fmt.Sscanf(val, "%d", &i)
	if err != nil {
		return defaultVal
	}
	return i
}
