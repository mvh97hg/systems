## CSF chặn request từ quốc gia với GeoIP Lite của MaxMind

1. Đăng ký tài khoản MaxMind 
2. Tạo khoá cấp phép
3. Mở file `/etc/csf/csf.conf`, tìm và cập nhật các cấu hình sau
    ```
    MM_LICENSE_KEY = "licensekey"
    CC_SRC = "1" # Sử dụng MaxMind databases
    LF_IPSET = "1" #bật ipset
    CC_ALLOW_FILTER = "VN" #Điền quốc gia cho phép truy cập. ngăn cách bằng dấu ','

    ```
4. Cài ipset
    ```
    apt install ipset -y
    apt-get install -y libwww-perl liblwp-protocol-https-perl libgd-graph-perl
    ```
5. Restart csf và kiểm tra kết quả
    ```
    csf -ra
    ```

## CSF allow udp sip server
    ```
    TCP_OUT = "1:65535"
    UDP_OUT = "1:65535"
    ```
