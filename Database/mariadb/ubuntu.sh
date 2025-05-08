#/bin/bash

sudo apt update && sudo apt upgrade
sudo apt -y install software-properties-common

curl -LsS https://r.mariadb.com/downloads/mariadb_repo_setup | sudo bash -s -- --mariadb-server-version=10.10

sudo apt install mariadb-server -y

#mysql_secure_installation 