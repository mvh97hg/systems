package main

import (
	"crypto/tls"

	gomail "gopkg.in/gomail.v2"
)

func SendMail(cfg *Config, messages string) {
	if !cfg.Mail {
		return
	}
	m := gomail.NewMessage()
	m.SetHeader("From", cfg.SmtpUser)
	m.SetHeader("To", cfg.Emails)
	m.SetHeader("Subject", cfg.MailSubject)
	m.SetBody("text/plain", messages)

	d := gomail.NewDialer(cfg.SmtpHost, cfg.SmtpPort, cfg.SmtpUser, cfg.SmtpPass)
	d.TLSConfig = &tls.Config{InsecureSkipVerify: true}
	if err := d.DialAndSend(m); err != nil {
		logger.Printf("ERROR: Không thể gửi email: %v\n", err)

	}

}
