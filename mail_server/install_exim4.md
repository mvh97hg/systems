Cài đặt exim4
```
sudo apt install exim4-daemon-heavy
```
Cấu hình Exim4

```
sudo dpkg-reconfigure exim4-config
```


sửa địa chỉ trong /etc/exim4/update.conf.conf

```
dc_local_interfaces='[0.0.0.0]:25; [0.0.0.0]:465; [0.0.0.0]:587
```

Mở /etc/exim4/exim4.conf.template

Điều chỉnh tùy chọn danh sách miền và thêm auth_advertise_hosts:

```
domainlist local_domains = MAIN_LOCAL_DOMAINS : lsearch;/etc/listofdomains
auth_advertise_hosts = ${if eq {$tls_in_cipher}{}{}{*}}

```
Thêm vào dưới main/03_exim4-config_tlsoptions
```
MAIN_TLS_ENABLE = true
```
 
 Thêm xác thực bằng dovecot vào sau begin authenticators trong /etc/exim4/exim4.conf.template :
 ```
#Dovecot Authenticator
dovecot_login:
  driver = dovecot
  public_name = LOGIN
  server_socket = /var/run/dovecot/auth-client
  server_set_id = $auth1
dovecot_plain:
  driver = dovecot
  public_name = PLAIN
  server_socket = /var/run/dovecot/auth-client
  server_set_id = $auth1 
 ```

Bật DKIM, đi đến cuối file và thêm:
```
DKIM_DOMAIN=ecshost.me
DKIM_SELECTOR=mail
DKIM_PRIVATE_KEY=/etc/exim4/dkim.pem
```


Cài đặt dovecot:
```
sudo apt install -yq dovecot-core dovecot-imapd dovecot-pop3d
```

Cài đặt ssl trong /etc/dovecot/conf.d/10-ssl.conf
  
  Sửa:
```
  ssl_cert = </etc/dovecot/private/dovecot.pem

  ssl_key = </etc/dovecot/private/dovecot.key 
```
  Thành:
```
  ssl_cert = </etc/letsencrypt/live/imap.ecshost.me/fullchain.pem

  ssl_key = </etc/letsencrypt/live/imap.ecshost.me/privkey.pem
```
Trong cùng một thư mục, file 10-auth.conf

thay đổi dòng 
```
auth_mechanism = plain
``` 
thành 
```
auth_mechanism = plain login
```


Trong cùng một thư mục, file 10-master.conf, trong khối service auth{...} chỉnh sửa 
```
service auth {
  unix_listener auth-userdb {
    mode = 0666
    user = Debian-exim

  }
  unix_listener auth-client {
        mode = 0660
        user = Debian-exim
    }

}
```
Trong cùng thư mục, file 10-mail.conf

comment dòng:
```
mail_location = mbox:~/mail:INBOX=/var/mail/%u
```
và bỏ comment dòng:
```
mail_location = maildir:~/Maildir
```

Tạo chứng chỉ ssl cho mail server
```
sudo certbot certonly -d mail.ecshost.me
```


```sudo ln -s /etc/letsencrypt/live/mail.ecshost.me/fullchain.pem /etc/exim4/exim.crt
sudo ln -s /etc/letsencrypt/live/mail.ecshost.me/privkey.pem /etc/exim4/exim.key
```

Tạo DKIM private key và public key bằng openssl
```
openssl genrsa -out dkim_private.pem 2048
openssl rsa -in dkim_private.pem -pubout -outform der 2>/dev/null | openssl base64 -A
```
Copy DKIM private key vào thư mục /etc/exim4/
```
sudo cp dkim_private.pem /etc/exim4/dkim.pem
sudo chmod 444 /etc/exim4/dkim.pem
```

Tạo file /etc/listofdomains
```
sudo touch /etc/listofdomains
```
Thêm tên miền của mail server và hostname của server vào file /etc/listofdomains. mỗi tên đặt một dòng
```
ecshost.me
mail.ecshost.me
ecs-hmv
```

Thiết lập tường lửa:
```
sudo ufw allow 25,465,587,993,995/tcp
sudo ufw reload
```

Cập nhật lại cấu hình Exim4 và khởi động lại:

```
sudo update-exim4.conf && sudo systemctl restart exim4
```

Khởi động lại dovecot

```
sudo systemctl restart dovecot
```


