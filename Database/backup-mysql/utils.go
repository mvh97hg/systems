package main

import (
	"fmt"
	"log"
	"os"
	"os/exec"
)

var logger *log.Logger

func InitLogger(logPath string) {
	logFile, err := os.OpenFile(logPath, os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
	if err != nil {
		fmt.Printf("⚠️ Could not open log file: %v\n", err)
		os.Exit(1)
	}
	logger = log.New(logFile, "", log.LstdFlags)
	logger.Printf("Start")
}

func CompressFile(filePath, command string) error {
	cmd := exec.Command(command, filePath)
	return cmd.Run()
}
