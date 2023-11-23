#!/bin/bash

# Đường dẫn đến thư mục chứa các bản backup
backup_folder="/mnt/backup_truenas/system_backups"

# Số lượng bản backup tối đa bạn muốn giữ lại
max_backups=10

# Đếm số lượng bản backup hiện tại trong thư mục
backup_count=$(ls -1 "$backup_folder" | wc -l)

# Nếu số lượng bản backup lớn hơn max_backups, thực hiện xóa các bản backup cũ
if [ "$backup_count" -gt "$max_backups" ]; then
    # Tính số lượng bản backup cần xoá
    backups_to_delete=$((backup_count - max_backups))

    # Lấy danh sách các bản backup từ cũ đến mới
    backups=$(ls -1t "$backup_folder")

    # Xoá các bản backup cũ
    for ((i = 1; i <= backups_to_delete; i++)); do
        index=$((max_backups + i))
        backup_to_delete=$(echo "$backups" | sed -n "${index}p")
        rm -rf "$backup_folder/$backup_to_delete"
        echo "Đã xoá bản backup cũ: $backup_to_delete"
    done
else
    echo "Số lượng bản backup hiện tại không vượt quá $max_backups, không cần xoá."
fi