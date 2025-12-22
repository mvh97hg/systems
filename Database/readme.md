## Dump database
```
sudo mysqldump -uroot -p database_name > backup.sql
```
# import database
```
sudo mysqlimport -uroot -p database_name < backup.sql
```
# backup 1 table
```
mysqldump -u root -p --lock-tables=false --add-drop-table=false database_name table > table_backup.sql
```
# import 1 table 
```
mysql -u root -p database_name < table_backup.sql
```
## Tạo user
```
CREATE USER 'username'@'localhost' IDENTIFIED BY 'pass@word';
```
## Tạo Database
```
CREATE DATABASE database_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
## Đổi mật khẩu
```
ALTER USER 'username'@'localhost' IDENTIFIED BY 'pass@word';
```
## Cấp quyền user vào db
```
GRANT ALL PRIVILEGES ON database_name.* TO 'username'@'localhost';
```
## Cấp quyền super
```
GRANT ALL PRIVILEGES ON database_name.* TO 'username'@'localhost' WITH GRANT OPTION;
```
## 
```
mysql_secure_installation
```

## Reset root password
- 1
```
sudo systemctl stop mysql
```
- 2 start mysql_safe

```mysqld_safe --skip-grant-tables &```
- 3 login

```mysql -u root```
- 4 Đổi mật khẩu mới

Cách 1

```
SET PASSWORD FOR 'root'@'localhost' = 'Hmv@12345';
FLUSH PRIVILEGES;
```
Cách 2

```USE mysql;
UPDATE user SET Password = PASSWORD('Hmv@12345')
   WHERE Host = 'localhost' AND User = 'root';
```
Cách 3
```
ALTER USER 'root'@'localhost' IDENTIFIED BY 'new_password';
FLUSH PRIVILEGES;
```