#!/bin/bash

# ==== CONFIGURATION ====
SRCDIR[0]="/data/camera1"
DSTDIR[0]="/mnt/backup1"
RSYNC_OPTS[0]="-urz --delete"
SYNC_INTERVAL[0]=30
RSYNC_TIMEOUT[0]=120

SRCDIR[1]="/data/camera2"
DSTDIR[1]="root@192.168.1.2:/mnt/backup2"
RSYNC_OPTS[1]="-urz --remove-source-files"
SYNC_INTERVAL[1]=60
RSYNC_TIMEOUT[1]=300

# ==== SCRIPT START ====

declare -a LAST_SYNC
declare -a SYNC_IN_PROGRESS
declare -a INOTIFY_PID

log() {
  echo "$(date '+%Y-%m-%d %H:%M:%S') - $1"
}

cleanup() {
  log "Stopping script..."
  for pid in "${INOTIFY_PID[@]}"; do
    if [ -n "$pid" ] && kill -0 "$pid" 2>/dev/null; then
      kill "$pid" 2>/dev/null
      wait "$pid" 2>/dev/null
    fi
  done
  exit 0
}

trap cleanup SIGINT SIGTERM

sync_pair() {
  local i=$1

  if [ "${SYNC_IN_PROGRESS[$i]}" = "1" ]; then
    log "[$i] Sync already running, skipping."
    return
  fi

  local now=$(date +%s)
  local last=${LAST_SYNC[$i]:-0}
  local interval=${SYNC_INTERVAL[$i]}
  local wait=$((interval - (now - last)))

  if [ "$wait" -gt 0 ]; then
    log "[$i] Sync too soon, wait $wait more seconds."
    return
  fi

  SYNC_IN_PROGRESS[$i]=1

  local src="${SRCDIR[$i]}"
  local dst="${DSTDIR[$i]}"
  local opts="${RSYNC_OPTS[$i]}"
  local timeout_val="${RSYNC_TIMEOUT[$i]}"

  log "[$i] Syncing: $src → $dst"
  timeout "$timeout_val" rsync $opts "$src/" "$dst/"

  if [ $? -eq 0 ]; then
    log "[$i] Sync successful"
    LAST_SYNC[$i]="$now"
  else
    log "[$i] Sync failed"
  fi

  SYNC_IN_PROGRESS[$i]=0
}

# Start inotifywait for each SRCDIR
for i in "${!SRCDIR[@]}"; do
  src="${SRCDIR[$i]}"
  log "[$i] Watching $src"
  (
    inotifywait -m -r -e create,modify "$src" --format '%w%f' 2>/dev/null
  ) | while read file; do
    log "[$i] Change detected: $file"
    sync_pair "$i"
  done &
  INOTIFY_PID[$i]=$!
done

# Wait for all background inotify processes
for pid in "${INOTIFY_PID[@]}"; do
  wait "$pid"
done
