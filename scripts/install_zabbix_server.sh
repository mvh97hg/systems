#!/bin/bash

# Detect the operating system
if [ -f /etc/redhat-release ]; then
    DISTRO='centos'
elif [ -f /etc/lsb-release ]; then
    DISTRO='ubuntu'
else
    echo "Unsupported operating system version."
    exit 1
fi

# Function to retrieve IPv4 address
get_ipv4() {
    ip -4 addr show eth0 | grep -oP '(?<=inet\s)\d+(\.\d+){3}'
}

# Function to generate a random password
generate_password() {
    openssl rand -base64 12
}

# Function to check if Zabbix Server is already installed
check_zabbix_installed() {
    ZABBIX_VERSION=$(zabbix_server -V 2>/dev/null | grep -oP '(?<=Zabbix \d+\.\d+\.\d+)')
    if [ -n "$ZABBIX_VERSION" ]; then
        echo "Zabbix Server $ZABBIX_VERSION is already installed."
        echo "To uninstall Zabbix Server, run this script with the '--uninstall' option."
        exit 0
    fi
}

# Install and configure Zabbix Server on CentOS
install_zabbix_centos() {
    # Install dependencies
    yum install -y epel-release
    yum install -y httpd mysql mysql-server php php-mysql php-gd php-ldap php-xml php-bcmath php-mbstring

    # Start services
    systemctl enable httpd
    systemctl enable mysqld
    systemctl start httpd
    systemctl start mysqld

    # Generate random password for MySQL
    MYSQL_PASSWORD=$(generate_password)
    echo $MYSQL_PASSWORD > mysql_root.txt
    # Secure MySQL installation
    mysql_secure_installation <<EOF

y
$MYSQL_PASSWORD
$MYSQL_PASSWORD
y
y
y
y
EOF

    # Install Zabbix Server
    rpm -Uvh https://repo.zabbix.com/zabbix/4.4/rhel/7/x86_64/zabbix-release-4.4-1.el7.noarch.rpm
    yum install -y zabbix-server-mysql zabbix-web-mysql

    # Configure Zabbix Server
    sed -i 's/# DBHost=localhost/DBHost=localhost/' /etc/zabbix/zabbix_server.conf
    sed -i "s/# DBPassword=/DBPassword=$MYSQL_PASSWORD/" /etc/zabbix/zabbix_server.conf

    # Create database and grant privileges
    mysql -uroot -p$MYSQL_PASSWORD -e "CREATE DATABASE zabbix CHARACTER SET utf8 COLLATE utf8_bin;"
    mysql -uroot -p$MYSQL_PASSWORD -e "CREATE USER 'zabbix'@'localhost' IDENTIFIED BY '$MYSQL_PASSWORD';"
    mysql -uroot -p$MYSQL_PASSWORD -e "GRANT ALL PRIVILEGES ON zabbix.* TO 'zabbix'@'localhost' WITH GRANT OPTION;"
    mysql -uroot -p$MYSQL_PASSWORD -e "FLUSH PRIVILEGES;"

    # Import database schema
    zcat /usr/share/doc/zabbix-server-mysql*/create.sql.gz | mysql -uzabbix -p$MYSQL_PASSWORD zabbix

    # Start Zabbix Server
    systemctl enable zabbix-server
    systemctl start zabbix-server

    # Configure Zabbix Web
    sed -i 's/# php_value date.timezone Europe\/Riga/php_value date.timezone Asia\/Ho_Chi_Minh/' /etc/httpd/conf.d/zabbix.conf

    # Restart httpd service
    systemctl restart httpd

    # Retrieve server IP address
    SERVER_IP=$(get_ipv4)

    # Save login information to a file
    echo "Zabbix Server installed successfully." > zabbix_login_info.txt
    echo "MySQL Username: zabbix" >> zabbix_login_info.txt
    echo "MySQL Password: $MYSQL_PASSWORD" >> zabbix_login_info.txt
    echo "Web Interface: http://$SERVER_IP/zabbix" >> zabbix_login_info.txt
    echo "Zabbix Server Version: $ZABBIX_VERSION" >> zabbix_login_info.txt
}

# Install and configure Zabbix Server on Ubuntu
install_zabbix_ubuntu() {
    # Install dependencies
    apt-get update
    apt-get install -y apache2 mysql-server mysql-client php php-mysql php-gd php-ldap php-xml php-bcmath php-mbstring

    # Start services
    systemctl enable apache2
    systemctl enable mysql
    systemctl start apache2
    systemctl start mysql

    # Generate random password for MySQL
    MYSQL_PASSWORD=$(generate_password)
    echo $MYSQL_PASSWORD > mysql_root.txt
    # Secure MySQL installation
    mysql_secure_installation <<EOF

y
$MYSQL_PASSWORD
$MYSQL_PASSWORD
y
y
y
y
EOF

    # Install Zabbix Server
    wget https://repo.zabbix.com/zabbix/4.4/ubuntu/pool/main/z/zabbix-release/zabbix-release_4.4-1+bionic_all.deb
    dpkg -i zabbix-release_4.4-1+bionic_all.deb
    apt-get update
    apt-get install -y zabbix-server-mysql zabbix-frontend-php

    # Configure Zabbix Server
    sed -i 's/# DBHost=localhost/DBHost=localhost/' /etc/zabbix/zabbix_server.conf
    sed -i "s/# DBPassword=/DBPassword=$MYSQL_PASSWORD/" /etc/zabbix/zabbix_server.conf

    # Create database and grant privileges
    mysql -uroot -p$MYSQL_PASSWORD -e "CREATE DATABASE zabbix CHARACTER SET utf8 COLLATE utf8_bin;"
    mysql -uroot -p$MYSQL_PASSWORD -e "CREATE USER 'zabbix'@'localhost' IDENTIFIED BY '$MYSQL_PASSWORD';"
    mysql -uroot -p$MYSQL_PASSWORD -e "GRANT ALL PRIVILEGES ON zabbix.* TO 'zabbix'@'localhost' WITH GRANT OPTION;"
    mysql -uroot -p$MYSQL_PASSWORD -e "FLUSH PRIVILEGES;"

    # Import database schema
    zcat /usr/share/doc/zabbix-server-mysql*/create.sql.gz | mysql -uzabbix -p$MYSQL_PASSWORD zabbix

    # Start Zabbix Server
    systemctl enable zabbix-server
    systemctl start zabbix-server

    # Configure Zabbix Web
    sed -i 's/# php_value date.timezone Europe\/Riga/php_value date.timezone Asia\/Ho_Chi_Minh/' /etc/apache2/conf-enabled/zabbix.conf

    # Restart apache2 service
    systemctl restart apache2

    # Retrieve server IP address
    SERVER_IP=$(get_ipv4)

    # Save login information to a file
    echo "Zabbix Server installed successfully." > zabbix_login_info.txt
    echo "MySQL Username: zabbix" >> zabbix_login_info.txt
    echo "MySQL Password: $MYSQL_PASSWORD" >> zabbix_login_info.txt
    echo "Web Interface: http://$SERVER_IP/zabbix" >> zabbix_login_info.txt
    echo "Zabbix Server Version: $ZABBIX_VERSION" >> zabbix_login_info.txt
}

# Uninstall Zabbix Server
uninstall_zabbix() {
    if [ "$DISTRO" == 'centos' ]; then
        yum remove -y zabbix-server-mysql zabbix-web-mysql
        systemctl disable zabbix-server
        systemctl stop zabbix-server
        systemctl disable httpd
        systemctl stop httpd
        systemctl disable mysqld
        systemctl stop mysqld
    elif [ "$DISTRO" == 'ubuntu' ]; then
        apt-get remove -y zabbix-server-mysql zabbix-frontend-php
        systemctl disable zabbix-server
        systemctl stop zabbix-server
        systemctl disable apache2
        systemctl stop apache2
        systemctl disable mysql
        systemctl stop mysql
    fi

    echo "Zabbix Server uninstalled successfully."
    exit 0
}

# Check if Zabbix Server is already installed
check_zabbix_installed

# Execute installation or uninstallation based on the detected operating system
if [ "$DISTRO" == 'centos' ]; then
    install_zabbix_centos
elif [ "$DISTRO" == 'ubuntu' ]; then
    install_zabbix_ubuntu
else
    echo "Unsupported operating system."
    exit 1
fi

# Prompt for uninstallation if Zabbix Server is already installed
if [ "$DISTRO" == 'centos' ] && [ -f /etc/zabbix/zabbix_server.conf ] || [ "$DISTRO" == 'ubuntu' ] && [ -f /etc/zabbix/zabbix_server.conf ]; then
    read -p "Zabbix Server is already installed. Do you want to uninstall it? (y/n): " uninstall_choice
    if [ "$uninstall_choice" == "y" ]; then
        uninstall_zabbix
    else
        echo "Exiting script."
        exit 0
    fi
fi
