# Hướng Dẫn Chuyển Dữ Liệu

Chuyển dữ liệu từ cPanel sang cPanel

- Bước 1: Login SSH vào server hosting. Xác định username cần chuyển đổi và chạy scripts sau
    ```
    /scripts/pkgacct username
    ```
Nếu chưa biết tên user thì có thể dùng lệnh sau
    
```
whmapi1 domainuserdata domain='domain.vn'
```
Scripts này sẽ thực hiện đóng gói tất cả dữ liệu thuộc tài khoản này bao gồm: mã nguồn, database, email, dns record,..v..v.. thành một file nén có định dạng “cpmove-username.tar.gz”
- Bước 2: Thực hiện download file “cpmove-username.tar.gz” về server hosting mới. Thực hiện copy file “cpmove-username.tar.gz” vào đường dẫn /usr/local/apache/htdocs/ hoặc /var/www/html và cấp quyền cho file
    ```
    chmod +644 /path/cpmove-username.tar.gz
    ```
**SSH vào server mới và thực hiện download bằng lệnh wget**

```
wget https://domain/cpmove-username.tar.gz
```
- Bước 3: Tại server cPanel mới thực hiện restore dữ liệu bằng lệnh sau:
    ```
    /scripts/restorepkg duong_dan_file_cpmove
    ```
## Chuyển dữ liệu từ DA sang DA
DirectAdmin hỗ trợ backup/restore dữ liệu trên giao diện admin tại menu “Admin Tools” => “Admin Backup/Transfer”. Ngoài ra còn có thể sử dụng cú pháp sau để thực hiện backup thông qua task.queue.

- Bước 1: Tiến hành SSH vào server DA và chạy lệnh sau:
    ```
    echo "action=backup&local%5Fpath=%2Fhome%2Fadmin%2Fadmin%5Fbackups&owner=admin&select%30=testuser&type=admin&value=multiple&when=now& where=local" >> /usr/local/directadmin/data/task.queue
    ```
Trong đó:

    - %30=testuser: nhập tên user tuơng ứng trong DA.
    - path=%2Fhome%2Fadmin%2Fadmin%5Fbackups: đường dẫn lưu trữ là /home/admin/admin_backups/

Chờ quá trình backup diễn ra trong ít phút tùy thuộc dung lượng của tài khoản. Có thể kiểm tra bằng cách list thư mục /home/admin/admin_backups. Định dạng file backup như sau:  user.admin.xesaigon.tar.gz

Trong đó:

    - admin: là tên reseller tạo ra tài khoản này
    - xesaigon: là tên user
- Bước 2: SSH vào server DA mới và thực hiện wget file backup vào đường dẫn /home/admin/admin_backups

Trước khi thực hiện restore cần lưu ý 2 vấn đề sau: 

Login vào giao diện DA và kiểm tra reseller đã tồn tài hay chưa. Nếu reseller là “admin” thì bỏ qua bước này. Nếu reseller không tồn tại phải thực hiện tạo reseller trùng tên với user.reseller01.xesaigon.tar.gz hoặc có thể chuyển tài khoản này về reseller khác bằng cách đổi tên file user.reseller01.xesaigon.tar.gz thành user.admin.xesaigon.tar.gz.
Tạo user, domain chính tuơng ứng trước khi thực hiện restore (không có bước này sẽ không tìm thấy user tuơng ứng với file backup và quá trình restore sẽ thất bại).

- Bước 3: Tại giao diện admin DA truy cập menu “Admin Tools” => “Admin Backup/Transfer”. Tại phần Restore Backup ở Step 3, check vào file backup cần restore và bấm “Submit”

Chờ quá trình restore hoàn tất và tiến hành login vào DA ở level user để kiểm tra dữ liệu.


## Chuyển dữ liệu từ cPanel sang DA
Hiện tại chưa có công cụ hoặc scripts nào cho phép migrate account từ cPanel sang DA đối với các phiên bản mới nhất. Việc chuyển dữ liệu website từ cPanel sang DA nên thực hiện thử công.

- Bước 1: Truy cập cPanel => “File Manager” => Nén thư mục “public_html” thành file *.tar.gz
- Bước 2: Truy cập PhpMyadmin và export tất cả các database hiện có.
- Bước 3: Tại giao diện admin DA tiến hành tạo user tuơng ứng và đăng nhập vào user vừa tạo.
- Bước 4: Vào File Manager và upload file *.tar.gz. Sau đó thực hiện giải nén.
 - Bước 5: Tạo database tuơng ứng và import các file SQL trong PhpMyadmin.
- Bước 6: Chỉnh sửa thông tin kết nối database các mã nguồn website đang có.
- Bước 7: Truy cập kiểm tra
