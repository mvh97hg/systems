#!/bin/bash

# Đường dẫn đến thư mục chứa các bản backup
backup_folder="/mnt/backup_truenas/system_backups"

max_backups=7


find $backup_folder -type d -name "[0-9][0-9]-[0-9][0-9]-[0-9][0-9]" ! -name "*-01-*" -mtime +$max_backups -exec rm -rf {} \; -prune

find $backup_folder -type d -name "[0-9][0-9]-[0-9][0-9]-[0-9][0-9]" \( -name "*-01-*" \) -mtime +92 -exec rm -rf {} \; -prune