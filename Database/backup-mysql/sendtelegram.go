package main

import (
	"fmt"
	"net/http"
	"net/url"
)

func SendTelegram(cfg *Config, message string) {
	if !cfg.Telegram {
		return
	}

	apiURL := fmt.Sprintf("https://api.telegram.org/bot%s/sendMessage", cfg.BotToken)
	data := url.Values{}
	data.Set("chat_id", cfg.ChatID)
	data.Set("text", message)
	data.Set("parse_mode", "HTML")

	_, err := http.PostForm(apiURL, data)
	if err != nil {
		logger.Printf("ERROR: Telegram error: %v", err)
	}
}
