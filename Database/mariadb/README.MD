## Cấu hình mariadb

```
[server]

[mysqld]

user                    = mysql
pid-file                = /run/mysqld/mysqld.pid
basedir                 = /usr
datadir                 = /var/lib/mysql
tmpdir                  = /tmp

bind-address            = 0.0.0.0
port                  = 3306
server-id  = 101
log_bin  = /var/lib/mysql/mysql-bin.log
binlog_format  = ROW
gtid_strict_mode  = ON
log_slave_updates  = ON
relay_log  = /var/log/mysql/relay-bin.log
gtid_domain_id  = 101
log_error = /var/log/mysql/error.log
slow_query_log_file    = /var/log/mysql/mariadb-slow.log
long_query_time    = 10
# auto_increment_increment = 2
# auto_increment_offset    = 1

# --- InnoDB Settings ---
innodb_buffer_pool_size = 10G
innodb_log_file_size = 1G
innodb_log_buffer_size = 256M
innodb_flush_log_at_trx_commit = 1
innodb_file_per_table = 1


query_cache_type = 0
query_cache_size = 0

# --- Thread & Connection ---
max_connections = 500
thread_cache_size = 64
table_open_cache = 2000
table_open_cache_instances = 8

# --- Temp Tables ---
tmp_table_size = 256M
max_heap_table_size = 256M

# --- Sort & Join Buffers ---
sort_buffer_size = 4M
join_buffer_size = 4M
read_buffer_size = 2M
read_rnd_buffer_size = 4M

# --- Binary Log & Replication ---
sync_binlog = 1
binlog_cache_size = 2M
max_binlog_size = 512M
expire_logs_days = 15

[embedded]

# This group is only read by MariaDB servers, not by MySQL.
# If you use the same .cnf file for MySQL and MariaDB,
# you can put MariaDB-only options here
[mariadb]

# This group is only read by MariaDB-10.11 servers.
# If you use the same .cnf file for MariaDB of different versions,
# use this group for options that older servers don't understand
[mariadb-10.11]

```

## Cấu hình Replica

```
STOP SLAVE;

CHANGE MASTER TO
  MASTER_HOST='master_ip',
  MASTER_USER='repl',
  MASTER_PASSWORD='StrongPassword',
  MASTER_USE_GTID=slave_pos;

START SLAVE;
```
