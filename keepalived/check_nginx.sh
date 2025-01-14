#!/bin/bash

# Kiểm tra trạng thái của Nginx bằng cách gửi một yêu cầu HTTP
curl -s http://localhost/nginx_status | grep -e "Active connections"  # Đảm bảo rằng Nginx trả về trạng thái hoạt động

if [ $? -eq 0 ]; then
    exit 0  # Nếu có phản hồi hợp lệ, trả về 0 (tốt)
else
    exit 1  # Nếu không có phản hồi hoặc có lỗi, trả về 1 (lỗi)
fi
