#/bin/bash

sudo apt update && sudo apt upgrade
sudo apt -y install software-properties-common

sudo apt-key adv --fetch-keys 'https://mariadb.org/mariadb_release_signing_key.asc'

sudo add-apt-repository 'deb [arch=amd64] http://mariadb.mirror.globo.tech/repo/10.5/ubuntu $(lsb_release -cs) main'


sudo apt update
sudo apt install mariadb-server


#

mysql_secure_installation 