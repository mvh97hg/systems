package notification

import (
	"context"
	"fmt"
	"net/http"
	"net/url"
	"time"
)

type TelegramNotifier struct {
	BotToken string
	ChatID   string
}

func NewTelegramNotifier(botToken, chatID string) *TelegramNotifier {
	return &TelegramNotifier{
		BotToken: botToken,
		ChatID:   chatID,
	}
}

func (t *TelegramNotifier) Send(ctx context.Context, message string) error {
	apiURL := fmt.Sprintf("https://api.telegram.org/bot%s/sendMessage", t.BotToken)
	data := url.Values{}
	data.Set("chat_id", t.ChatID)
	data.Set("text", message)
	data.Set("parse_mode", "HTML")

	req, err := http.NewRequestWithContext(ctx, "POST", apiURL, nil)
	if err != nil {
		return fmt.Errorf("failed to create request: %w", err)
	}
	req.URL.RawQuery = data.Encode()

	client := &http.Client{Timeout: 10 * time.Second}
	resp, err := client.Do(req)
	if err != nil {
		return fmt.Errorf("failed to send telegram request: %w", err)
	}
	defer resp.Body.Close()

	if resp.StatusCode != http.StatusOK {
		return fmt.Errorf("telegram api returned status: %d", resp.StatusCode)
	}

	return nil
}
