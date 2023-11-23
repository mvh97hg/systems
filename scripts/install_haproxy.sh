#!/bin/bash

sudo apt update && apt upgrade -y

sudo apt-get install --no-install-recommends software-properties-common -y

sudo add-apt-repository ppa:vbernat/haproxy-2.7 

echo -ne '\n'
sudo apt update

sudo apt install haproxy=2.7.\* -y