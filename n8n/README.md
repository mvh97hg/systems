# n8n Self-host Template

## Requirements
- Docker
- Docker Compose
- Reverse Proxy (Nginx / Traefik)
- Domain + HTTPS

## Setup
```bash
cp .env.example .env
nano .env
docker compose up -d
