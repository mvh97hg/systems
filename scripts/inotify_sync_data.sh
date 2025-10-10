#!/bin/bash
BASE_SOURCE="/sourcedir"
BASE_DEST="/destdir"
YEAR=$(date +%Y)
MONTH=$(date +%m)

SOURCE_DIR="${BASE_SOURCE}/${YEAR}/${MONTH}/"
DEST_DIR="${BASE_DEST}/${YEAR}/${MONTH}/"

SYNC_INTERVAL=0
LAST_SYNC_TIME=0
SYNC_IN_PROGRESS=0
RSYNC_TIMEOUT=120

INOTIFY_PID=0

log() {
    echo "$(date '+%Y-%m-%d %H:%M:%S') - $1"
}

cleanup() {
    log "Receive stop signal (Ctrl+C), end script..."
    if [ $INOTIFY_PID -ne 0 ]; then
        kill $INOTIFY_PID 2>/dev/null
        wait $INOTIFY_PID 2>/dev/null
    fi
    exit 0
}

trap cleanup SIGINT SIGTERM

sync_data() {
    if [ $SYNC_IN_PROGRESS -eq 1 ]; then
        log "Sync đang chạy..."
        return
    fi

    NOW=$(date +%s)
    if [ $((NOW - LAST_SYNC_TIME)) -lt $SYNC_INTERVAL ]; then
        log "Sync too close, wait another $((SYNC_INTERVAL - (NOW - LAST_SYNC_TIME))) seconds."
        return
    fi

    SYNC_IN_PROGRESS=1
    log "Start sync..."
    timeout "$RSYNC_TIMEOUT" rsync -urz "$SOURCE_DIR" "$DEST_DIR"
    if [ $? -eq 0 ]; then
        log "Sync successful."
        LAST_SYNC_TIME=$(date +%s)
    else
        log "Sync failed. $?"
    fi
    SYNC_IN_PROGRESS=0
    #log "End..."
}

(
    inotifywait -m -r -e create,modify "$SOURCE_DIR" --format '%w%f'
) | while read FILE; do
    log "Change detection: $FILE"
    sync_data
done &

INOTIFY_PID=$!
wait $INOTIFY_PID
