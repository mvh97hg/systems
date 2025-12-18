#!/bin/bash

BASE_DIR="$(cd "$(dirname "$0")/.." && pwd)"
BACKUP_DIR="$BASE_DIR/backup"
DATE=$(date +"%Y%m%d_%H%M")

mkdir -p "$BACKUP_DIR"

echo "[+] Backup PostgreSQL"
docker exec n8n_postgres pg_dump -U n8n n8n \
  > "$BACKUP_DIR/db_$DATE.sql"

echo "[+] Backup n8n data"
tar czf "$BACKUP_DIR/n8n_data_$DATE.tar.gz" \
  "$BASE_DIR/data"

echo "[+] Cleanup old backups (>7 days)"
find "$BACKUP_DIR" -type f -mtime +7 -delete
