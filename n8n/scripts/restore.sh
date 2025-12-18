#!/bin/bash

read -p "DB backup file (full path): " DB_FILE
read -p "Data backup file (full path): " DATA_FILE

BASE_DIR="$(cd "$(dirname "$0")/.." && pwd)"

echo "[!] Stop services"
docker compose down

echo "[+] Restore n8n data"
rm -rf "$BASE_DIR/data/*"
tar xzf "$DATA_FILE" -C /

echo "[+] Start PostgreSQL"
docker compose up -d postgres
sleep 10

echo "[+] Restore database"
docker exec -i n8n_postgres psql -U n8n n8n < "$DB_FILE"

echo "[+] Start n8n"
docker compose up -d
