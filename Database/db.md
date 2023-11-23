#export database
sudo mysqldump -uroot -p wp_db > /home/hungmv/wp_dump.sql

#import database
sudo mysqlimport -uroot -p --default-auth=mysql_native_password wp_db_new < /home/hungmv/wp_dump.sql

#import 1 table 
mysql -u root -p --default-auth=mysql_native_password import_table < /home/hungmv/wp_comments.sql

#export
mysqldump -u root -p --lock-tables=false --default-auth=mysql_native_password wp_db wp_comments > /home/hungmv/wp_comments.sql

CREATE USER 'root'@'localhost' IDENTIFIED BY 'new_password';
CREATE DATABASE database_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

ALTER USER 'root'@'localhost' IDENTIFIED BY 'O24Kb=~sSk5b';


GRANT ALL PRIVILEGES ON database_name.* TO 'username'@'localhost';


##
mysql_secure_installation

