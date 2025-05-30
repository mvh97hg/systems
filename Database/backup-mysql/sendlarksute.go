package main

import (
	"bytes"
	"encoding/json"
	"io"
	"net/http"
)

func SendLarkSuite(cfg *Config, message string) {

	if !cfg.Lark {
		return
	}
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
					"content": cfg.LarkMessageTitle,
				},
			},
		},
	})

	responseBody := bytes.NewBuffer(messageCard)

	resp, err := http.Post(cfg.LarkUrl, "application/json", responseBody)
	if err != nil {
		logger.Printf("ERROR: %v\n", err)
	}

	body, err := io.ReadAll(resp.Body)
	if err != nil {
		logger.Printf("ERROR: %v %s\n", err, body)
	}

}
