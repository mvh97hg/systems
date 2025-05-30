package main

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

	BackupDir     string
	LogFile       string
	LogTimeFormat string

	CompressionCmd string
	CompressionExt string

	RemoveOld bool
	Days      int
	Months    int

	Telegram bool
	BotToken string
	ChatID   string

	MaxConcurrentBackups int

	Lark             bool
	LarkUrl          string
	LarkMessageTitle string

	BackupFiles []string

	Mail        bool
	SmtpHost    string
	SmtpPort    int
	SmtpUser    string
	SmtpPass    string
	MailSubject string
	Emails      string
}

func LoadConfig() *Config {
	if err := godotenv.Load(); err != nil {
		log.Fatal("Error loading .env file")
	}
	maxThreads, err := strconv.Atoi(os.Getenv("MAX_CONCURRENT_BACKUPS"))

	if err != nil || maxThreads < 1 {
		maxThreads = 2 // fallback nếu không hợp lệ
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

		BackupDir:     os.Getenv("BACKUP_DIR"),
		LogFile:       os.Getenv("LOGFILE"),
		LogTimeFormat: os.Getenv("LOG_TIME_FORMAT"),

		CompressionCmd: os.Getenv("COMPRESSION_COMMAND"),
		CompressionExt: os.Getenv("COMPRESSION_EXTENSION"),

		RemoveOld: os.Getenv("DELETE") == "y",
		Days:      parseEnvInt("DAYS", 30),
		Months:    parseEnvInt("MONTHS", 3),

		Telegram:             os.Getenv("TELEGRAM") == "y",
		BotToken:             os.Getenv("BOTTOKEN"),
		ChatID:               os.Getenv("CHATID"),
		MaxConcurrentBackups: maxThreads,

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
