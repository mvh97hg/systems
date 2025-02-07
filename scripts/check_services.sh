#!/bin/bash

# Danh sách các dịch vụ cần kiểm tra
SERVICES=("qloaderd" "asterisk" "syncrecord")

# Thông tin Telegram
BOT_TOKEN="token"
CHAT_ID="chatid"
IP=$(/sbin/ip -4 -o addr show scope global | awk '{gsub(/\/.*/,"",$4); print $4}' | sed 's/ /\n/g')

send_telegram_message() {
    local MESSAGE="$1"
    curl -s -X POST "https://api.telegram.org/bot$BOT_TOKEN/sendMessage" \
        -d chat_id="$CHAT_ID" \
        -d text="$MESSAGE"
}

check() {
    local SERVICE="$1"
    
    # Kiểm tra trạng thái dịch vụ
    STATUS=$(systemctl show -p SubState "$SERVICE" | sed 's/SubState=//')

    if systemctl is-active --quiet "$SERVICE" && [[ "$(systemctl show -p SubState "$SERVICE" | sed 's/SubState=//')" == "running" ]]; then
        echo "$SERVICE is running"
    else
        # Kiểm tra nếu dịch vụ đã thoát (exited)
        if [[ "$STATUS" != "running" ]]; then
            echo "$SERVICE has exited, stopping and restarting..."
            systemctl stop "$SERVICE"  # Dừng dịch vụ nếu nó đang chạy
            systemctl start "$SERVICE"  # Khởi động lại dịch vụ
            sleep 5
            # Kiểm tra lại nếu start thành công
            if systemctl is-active --quiet "$SERVICE" && [[ "$(systemctl show -p SubState "$SERVICE" | sed 's/SubState=//')" == "running" ]]; then
                echo "$SERVICE has been restarted successfully"
                send_telegram_message "$(hostname)-$IP: $SERVICE was exited but has been restarted successfully."
            else
                echo "Failed to restart $SERVICE"
                send_telegram_message "$(hostname)-$IP: $SERVICE could not be restarted."
            fi
        fi
    fi
}

for SERVICE in "${SERVICES[@]}"; do
    check "$SERVICE"
done
