## Bảo mật máy chủ docker với firewalld

Vô hiệu hóa iptables cho Docker

Vô hiệu hóa iptables cho docker, tạo file /etc/docker/daemon.json như sau:

```
{
    "dns": ["8.8.8.8", "1.1.1.1"],
    "iptables": false
}
```

Khởi động lại docker:
```
systemctl restart docker
```

### Cấu hình tường lửa
Thêm Masquerading vào vùng dẫn ra Internet, thường là public:

```
firewall-cmd --zone=public --add-masquerade --permanent
firewall-cmd --reload
```

Ngoài ra, để cho phép các container docker truy cập vào các cổng máy chủ, hãy thêm giao diện docker vào zone trusted:

```
firewall-cmd --permanent --zone=trusted --add-interface=docker0
firewall-cmd --reload
systemctl restart docker
```