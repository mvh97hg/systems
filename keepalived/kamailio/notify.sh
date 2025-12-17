#!/bin/bash

LOGFILE="/var/log/keepalived.log"

log() {
    echo "$(date '+%Y-%m-%d %H:%M:%S') - $1" | tee -a $LOGFILE
}

run() {
    CMD="$1"
    #log "EXEC: $CMD"
    eval $CMD
    if [ $? -ne 0 ]; then
        log "ERROR: Command failed ? $CMD"
    fi
}

case "$1" in
  master)
    log "[KEEPALIVED] Switching to MASTER routes"

    run "/usr/sbin/ip link set dev ens19 up"
    run "/usr/sbin/ip route replace default via 192.168.10.10 dev vip"

    #log "Route table (MASTER):"
    #log "$(ip route show)"
    ;;

  backup)
    log "[KEEPALIVED] Switching to BACKUP routes"
    run "/usr/sbin/ip link set dev ens19 up"
    run "/usr/sbin/ip route replace default via 172.16.30.1 dev eth0"

    #log "Route table (BACKUP):"
    #log "$(ip route show)"
    ;;

  fault)
    log "[KEEPALIVED] FAULT: switching to BACKUP default route"
    run "/usr/sbin/ip link set dev ens19 up"
    run "/usr/sbin/ip route replace default via 172.16.30.1 dev eth0"

    #log "Route table (FAULT):"
    #log "$(ip route show)"
    ;;

  *)
    log "UNKNOWN ARG: $1"
    ;;
esac

exit 0
