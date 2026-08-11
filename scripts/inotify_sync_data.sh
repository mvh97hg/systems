#!/bin/bash

# ==============================================================================
# ==== SYNC DIRECTORY CONFIGURATION =============================================
# Format:
#   "SOURCE_DIR | DEST_DIR | RSYNC_OPTIONS | SYNC_INTERVAL | TIMEOUT"
#
# SYNC_INTERVAL:
#   0  = real-time mode using inotifywait
#   >0 = interval mode, sync every N seconds (batch/debounce mode)
# Example: 
# CONFIG_LIST=" 
# /var/spool/asterisk/monitor/ready_to_sync | /mnt/gluster-client | -rlptDcv --remove-source-files | 0  | 120 
# /data/camera1                             | /mnt/backup1        | -rlptDcv --delete              | 30 | 120 
# /data/camera2                             | /mnt/backup2        | -rlptDcv                       | 60 | 300 
# " 
# ==============================================================================
# ==============================================================================
CONFIG_LIST=""

SYSLOG_TAG="multi-sync-engine"
REALTIME_DEBOUNCE_SECONDS=2

log_error() {
    logger -t "$SYSLOG_TAG" -p user.err "[ERROR] [$1] $2"
}

log_info() {
    logger -t "$SYSLOG_TAG" -p user.notice "[INFO] [$1] $2"
}

require_commands() {
    for cmd in rsync timeout logger mountpoint basename dirname xargs sed grep inotifywait df awk; do
        command -v "$cmd" >/dev/null 2>&1 || {
            echo "[ERROR] Missing required command: $cmd" >&2
            exit 1
        }
    done
}

cleanup() {
    log_info "SYSTEM" "Stopping multi-sync engine. Terminating child workers."
    trap - SIGTERM SIGINT EXIT
    kill 0 2>/dev/null
}

trap cleanup SIGTERM SIGINT EXIT

is_positive_integer_or_zero() { [[ "$1" =~ ^[0-9]+$ ]]; }
is_positive_integer() { [[ "$1" =~ ^[1-9][0-9]*$ ]]; }

check_mount_safety() {
    local path="$1" active_mount current
    active_mount=$(df -P "$path" 2>/dev/null | awk 'NR==2 {print $6}')
    [ -z "$active_mount" ] && return 1
    [ "$active_mount" != "/" ] && return 0

    # If active mount is /, check if it should be mounted (e.g. starts with /mnt, /media, /Volumes)
    [[ "$path" =~ ^/(mnt|media|Volumes)/ ]] && return 1
    
    # Check if any parent (excluding /) is configured in /etc/fstab
    current=$(readlink -f "$path" 2>/dev/null || realpath "$path" 2>/dev/null || echo "$path")
    while [ "$current" != "/" ] && [ -n "$current" ]; do
        if [ -f /etc/fstab ] && grep -qE "^[^#].*[[:space:]]+${current%/}[[:space:]]+" /etc/fstab; then
            return 1
        fi
        current="$(dirname "$current")"
    done
    return 0
}

check_safety() {
    local src="$1" dst="$2" parent_dir
    [ -d "$src" ] || return 2
    check_mount_safety "$src" || return 4
    [[ "$dst" =~ : ]] && return 0

    if [ ! -d "$dst" ]; then
        parent_dir=$(dirname "$dst")
        check_mount_safety "$parent_dir" || return 1
        mkdir -p "$dst" 2>/dev/null || return 3
    fi
    check_mount_safety "$dst" || return 1
    return 0
}

run_rsync() {
    local task_name="$1" opts="$2" src="$3" dst="$4" timeout_val="$5" status rsync_output delay=5 max_delay=60
    while true; do
        check_safety "$src" "$dst" || {
            log_safety_error "$task_name" "$src" "$dst" "$?"
            sleep 10; continue
        }

        log_info "$task_name" "Running rsync transfer..."
        rsync_output=$(timeout "$timeout_val" bash -c 'rsync "$@"' bash $opts "$src" "$dst" 2>&1)
        status=$?

        if [ "$status" -eq 0 ] || [ "$status" -eq 24 ]; then
            log_info "$task_name" "Sync completed $( [ "$status" -eq 24 ] && echo "with warnings" || echo "successfully" )."
            return 0
        fi

        log_error "$task_name" "rsync failed (exit: $status). Details: $rsync_output"
        [[ "$status" =~ ^(1|2|4)$ ]] && return "$status" # Fatal errors: syntax, protocol, unsupported

        log_info "$task_name" "Retrying in $delay seconds..."
        sleep "$delay"
        (( delay = delay * 2 > max_delay ? max_delay : delay * 2 ))
    done
}

log_safety_error() {
    local task_name="$1" src="$2" dst="$3" status="$4"
    local msgs=(
        ""
        "Destination mount is unavailable: $dst"
        "Source path does not exist: $src"
        "Destination path does not exist and cannot be created: $dst"
        "Source mount is unavailable: $src"
    )
    log_error "$task_name" "ALERT: ${msgs[$status]:-Unknown safety check failure ($status)}"
}

worker_sync() {
    local src="$1" dst="$2" opts="$3" interval="$4" timeout_val="$5" task_name wait_time line next_line
    task_name="$(basename "$src")"
    wait_time=$(( interval > 0 ? interval : REALTIME_DEBOUNCE_SECONDS ))

    log_info "$task_name" "Sync worker started (wait_time=${wait_time}s)."

    while true; do
        check_safety "$src" "$dst" || {
            log_safety_error "$task_name" "$src" "$dst" "$?"
            sleep 10; continue
        }

        local fifo
        fifo=$(mktemp -u 2>/dev/null || echo "/tmp/sync_fifo_${task_name}_$$")
        rm -f "$fifo" && mkfifo "$fifo" || { sleep 10; continue; }

        inotifywait -m -r -e close_write,moved_to,delete,moved_from --format '%w%f' "$src" 2>/dev/null > "$fifo" &
        local watcher_pid=$!
        exec 3<"$fifo" && rm -f "$fifo"

        log_info "$task_name" "Started inotifywait watcher (PID: $watcher_pid)."

        while read -u 3 -r line; do
            [[ "$(basename "$line")" =~ ^\. ]] && continue
            log_info "$task_name" "Change in $line. Debouncing ${wait_time}s..."

            local start_time=${EPOCHSECONDS:-$(date +%s)}
            while :; do
                local now=${EPOCHSECONDS:-$(date +%s)}
                local remaining=$(( wait_time - (now - start_time) ))
                (( remaining <= 0 )) && break
                read -u 3 -t "$remaining" -r next_line && : || break
            done

            check_safety "$src" "$dst" && {
                log_info "$task_name" "Starting batch sync."
                run_rsync "$task_name" "$opts" "$src/" "$dst/" "$timeout_val"
            } || {
                log_error "$task_name" "Safety check failed. Restarting watcher."
                break
            }
        done

        kill "$watcher_pid" 2>/dev/null
        wait "$watcher_pid" 2>/dev/null
        exec 3<&-
        sleep 5
    done
}

start_worker() {
    worker_sync "$1" "$2" "$3" "$4" "$5" &
}

main() {
    local task_count=0 line raw_src raw_dst raw_opts raw_interval raw_timeout src dst opts interval timeout_value
    require_commands
    log_info "SYSTEM" "Starting multi-sync engine."

    while IFS= read -r line; do
        [[ "$line" =~ ^[[:space:]]*($|#) ]] && continue
        IFS='|' read -r raw_src raw_dst raw_opts raw_interval raw_timeout <<< "$line"

        src=$(echo "$raw_src" | xargs)
        dst=$(echo "$raw_dst" | xargs)
        opts=$(echo "$raw_opts" | xargs)
        interval=$(echo "$raw_interval" | xargs)
        timeout_value=$(echo "$raw_timeout" | xargs)

        if [ -z "$src" ] || [ -z "$dst" ] || [ -z "$opts" ] || ! is_positive_integer_or_zero "$interval" || ! is_positive_integer "$timeout_value"; then
            log_error "SYSTEM" "Invalid configuration line skipped: $line"
            continue
        fi

        start_worker "$src" "$dst" "$opts" "$interval" "$timeout_value"
        (( task_count++ ))
        log_info "SYSTEM" "Started sync task: source=$src destination=$dst interval=$interval timeout=$timeout_value"
    done <<< "$CONFIG_LIST"

    [ "$task_count" -eq 0 ] && { log_error "SYSTEM" "No sync tasks configured. Exiting."; exit 1; }
    wait
}

main
