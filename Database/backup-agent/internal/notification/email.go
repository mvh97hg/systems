package notification

import (
	"context"
	"crypto/tls"
	"fmt"

	gomail "gopkg.in/gomail.v2"
)

type EmailNotifier struct {
	SmtpHost    string
	SmtpPort    int
	SmtpUser    string
	SmtpPass    string
	MailSubject string
	Emails      string
}

func NewEmailNotifier(host string, port int, user, pass, subject, emails string) *EmailNotifier {
	return &EmailNotifier{
		SmtpHost:    host,
		SmtpPort:    port,
		SmtpUser:    user,
		SmtpPass:    pass,
		MailSubject: subject,
		Emails:      emails,
	}
}

func (e *EmailNotifier) Send(ctx context.Context, message string) error {
	m := gomail.NewMessage()
	m.SetHeader("From", e.SmtpUser)
	m.SetHeader("To", e.Emails)
	m.SetHeader("Subject", e.MailSubject)
	m.SetBody("text/plain", message)

	d := gomail.NewDialer(e.SmtpHost, e.SmtpPort, e.SmtpUser, e.SmtpPass)
	d.TLSConfig = &tls.Config{InsecureSkipVerify: true}

	// gomail doesn't support context natively, so we just run DialAndSend.
	// But it is fast enough and runs in backup cycle.
	if err := d.DialAndSend(m); err != nil {
		return fmt.Errorf("failed to send email: %w", err)
	}

	return nil
}
