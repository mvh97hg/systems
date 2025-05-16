## CSF chặn request từ quốc gia với GeoIP Lite của MaxMind
1. Cài csf và ipset
    ```
    apt-get update
    apt-get install -y ipset libwww-perl liblwp-protocol-https-perl libgd-graph-perl

    mkdir -p csf && cd csf
    curl -Ls https://download.configserver.com/csf.tgz | tar --strip-components 1 -xz
    ./install.sh
    ```
2. Đăng ký tài khoản MaxMind 
3. Tạo khoá cấp phép
4. Mở file `/etc/csf/csf.conf`, tìm và cập nhật các cấu hình sau
    ```
    MM_LICENSE_KEY = "licensekey"
    CC_SRC = "1" # Sử dụng MaxMind databases
    LF_IPSET = "1" #bật ipset
    CC_ALLOW_FILTER = "VN" #Điền quốc gia cho phép truy cập. ngăn cách bằng dấu ','

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
### Cấu hình cho docker

`/etc/docker/daemon.json`
```
{
"iptables": false
}
```
Khởi động lại docker
```
systemctl restart docker
```

tạo cấp quyền thực thi cho file [/etc/csf/csfpost.sh](csfpost.sh)
```
chmod +x /etc/csf/csfpost.sh
csf -ra
```


```
LF_CUSTOM1_LOG = "/var/log/asterisk/messages"

```