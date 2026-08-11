# chmod 644 /etc/profile.d/bash_history.sh
# Hiển thị thời gian thực thi lệnh trong history

export HISTTIMEFORMAT="[%Y-%m-%d %H:%M:%S] "

# Tăng số lượng lệnh lưu
export HISTSIZE=100000
export HISTFILESIZE=200000

# Ghi history xuống file ngay sau mỗi lệnh
export PROMPT_COMMAND='history -a'

# Đồng bộ history giữa nhiều terminal
export PROMPT_COMMAND="history -a; history -n"