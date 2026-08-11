package notification

import (
	"bytes"
	"context"
	"encoding/json"
	"fmt"
	"io"
	"net/http"
	"time"
)

type LarkNotifier struct {
	WebhookUrl   string
	MessageTitle string
}

func NewLarkNotifier(webhookUrl, messageTitle string) *LarkNotifier {
	return &LarkNotifier{
		WebhookUrl:   webhookUrl,
		MessageTitle: messageTitle,
	}
}

func (l *LarkNotifier) Send(ctx context.Context, message string) error {
	messageCard, err := json.Marshal(map[string]interface{}{
		"msg_type": "interactive",
		"card": map[string]interface{}{
			"elements": []interface{}{
				map[string]interface{}{
					"tag": "div",
					"text": map[string]interface{}{
						"tag":     "lark_md",
						"content": message,
					},
				},
			},
			"header": map[string]interface{}{
				"title": map[string]interface{}{
					"tag":     "plain_text",
					"content": l.MessageTitle,
				},
			},
		},
	})
	if err != nil {
		return fmt.Errorf("failed to marshal lark message: %w", err)
	}

	req, err := http.NewRequestWithContext(ctx, "POST", l.WebhookUrl, bytes.NewReader(messageCard))
	if err != nil {
		return fmt.Errorf("failed to create request: %w", err)
	}
	req.Header.Set("Content-Type", "application/json")

	client := &http.Client{Timeout: 10 * time.Second}
	resp, err := client.Do(req)
	if err != nil {
		return fmt.Errorf("failed to send lark request: %w", err)
	}
	defer resp.Body.Close()

	if resp.StatusCode != http.StatusOK {
		body, _ := io.ReadAll(resp.Body)
		return fmt.Errorf("lark api returned status: %d, body: %s", resp.StatusCode, string(body))
	}

	return nil
}
