package main

import (
	"crypto/tls"
	"fmt"

	gomail "gopkg.in/gomail.v2"
)

func SendMail(cfg *Config, messages string) error {

	m := gomail.NewMessage()
	m.SetHeader("From", cfg.SmtpUser)
	m.SetHeader("To", cfg.Emails)
	m.SetHeader("Subject", cfg.MailSubject)
	m.SetBody("text/plain", messages)

	d := gomail.NewDialer(cfg.SmtpHost, cfg.SmtpPort, cfg.SmtpUser, cfg.SmtpPass)
	d.TLSConfig = &tls.Config{InsecureSkipVerify: true}
	if err := d.DialAndSend(m); err != nil {
		logger.Printf("ERROR: Không thể gửi email: %v\n", err)
		return fmt.Errorf("không thể gửi email: %v", err)
	}
	return nil

}
