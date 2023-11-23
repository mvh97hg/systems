#!/bin/bash
#conrtab 0 6 * * 5 /vinahost/report_weekly.sh

# Thay đổi thông tin này
BOT_TOKEN='5843252858:AAEXc_-LAInMUQn5FjMhxXmn7edRtmfqgvg'
CHAT_ID='-955098027'

# Lấy thông tin hệ thống
hostname=$(hostname)
ip=$((/sbin/ip -4 -o addr show scope global | awk '{gsub(/\/.*/,"",$4); print $4}') | sed 's/ /\n/g')
cpu_percent=$(top -b -n 1 | grep 'Cpu' | awk '{printf "%.2f", $2 + $3 + $4}')
ram_used=$(free -h | awk '/^Mem/ {print $3}')
ram_total=$(free -h | awk '/^Mem/ {print $2}')
ram_percent=$(free -k | awk '/^Mem/ {printf "%.2f%", $3/$2*100}' | sed 's/%//g')
disk_usage=$(df -h)
load_avg=$(cat /proc/loadavg | awk '{print $1, $2, $3}')

# Tạo nội dung tin nhắn
message="
Host: $hostname $ip
CPU Usage: $cpu_percent%
Load Average: $load_avg
RAM Usage: $ram_percent% ($ram_used /$ram_total)
Disk Usage:
$disk_usage
"
# URL API của Telegram
telegram_url="https://api.telegram.org/bot$BOT_TOKEN/sendMessage"

# Gửi yêu cầu POST đến Telegram API
curl -s -X POST "$telegram_url" -d "chat_id=$CHAT_ID" -d "text=$message" -d "parse_mode=HTML"

# Kiểm tra kết quả
if [[ $? -eq 0 ]]; then
  echo "Thông tin đã được gửi thành công đến nhóm Telegram."
else
  echo "Đã xảy ra lỗi khi gửi thông tin đến nhóm Telegram."
fi