#!/bin/bash

# Get the current system hostname
HOSTNAME=$(hostname)
read -p "Nhap IP Zabbix Server: " SERVER_IP

read -p "Nhap Host Metadata: " HOST_METADATA

if [ -z "$SERVER_IP" ]; then
  echo "Thieu IP Zabbix Server"
  exit 1
fi
if ! echo "$SERVER_IP" | grep -Pq '^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$'; then
  echo "Dia chi IP khong hop le: $SERVER_IP"
  exit 1
fi

# Detect the operating system
if [ -f /etc/redhat-release ]; then
  DISTRO='centos'
elif [ -f /etc/lsb-release ]; then
  DISTRO='ubuntu'
else
  echo "Unsupported operating system version."
  exit 1
fi

# Function to check if Zabbix Agent is already installed
check_zabbix_agent_installed() {
  ZABBIX_AGENT_VERSION=$(zabbix_agentd -V 2>/dev/null)
  if [ -n "$ZABBIX_AGENT_VERSION" ]; then
    echo "Zabbix Agent $ZABBIX_AGENT_VERSION is already installed."
    read -p "Do you want to uninstall and reinstall Zabbix Agent? (y/n): " reinstall_choice
    if [ "$reinstall_choice" == "y" ]; then
    Uninstall_zabbix_agent
      install_zabbix_agent
    else
      echo "Exiting script."
      exit 0
    fi
  else
    install_zabbix_agent
  fi
}
config_zabbix_agent() {
  sed -i "s/Server=127.0.0.1/Server=$SERVER_IP" /etc/zabbix/zabbix_agentd.conf
  sed -i "s/ServerActive=127.0.0.1/ServerActive=$SERVER_IP/" /etc/zabbix/zabbix_agentd.conf
  if [ -n "$HOST_METADATA" ]; then
    sed -i "s/# HostMetadata=/HostMetadata=$HOST_METADATA/" /etc/zabbix/zabbix_agentd.conf
  fi


  # Start Zabbix Agent
  systemctl enable zabbix-agent
  systemctl start zabbix-agent

  echo "Zabbix Agent installed successfully."
}
# Install and configure Zabbix Agent on CentOS
install_zabbix_agent_centos() {
  # Install dependencies
  rpm -Uvh https://repo.zabbix.com/zabbix/6.0/rhel/7/x86_64/zabbix-release-6.0-4.el7.noarch.rpm
  yum clean all
  yum install zabbix-agent -y
  # Configure Zabbix Agent
  config_zabbix_agent
  systemctl restart zabbix-agent
  systemctl enable zabbix-agent
}

# Install and configure Zabbix Agent on Ubuntu
install_zabbix_agent_ubuntu() {
  # Install dependencies
  apt-get update
  apt-get install -y wget
  wget https://repo.zabbix.com/zabbix/6.0/ubuntu/pool/main/z/zabbix-release/zabbix-release_6.0-4+ubuntu20.04_all.deb
  dpkg -i zabbix-release_6.0-4+ubuntu20.04_all.deb
  apt-get update
  apt install zabbix-agent -y

  # Configure Zabbix Agent
  config_zabbix_agent
  systemctl restart zabbix-agent
  systemctl enable zabbix-agent
}

# Uninstall Zabbix Agent
uninstall_zabbix_agent() {
  if [ "$DISTRO" == 'centos' ]; then
    systemctl disable zabbix-agent
    systemctl stop zabbix-agent
    yum remove -y zabbix-agent
    
  elif [ "$DISTRO" == 'ubuntu' ]; then
    systemctl disable zabbix-agent
    systemctl stop zabbix-agent
    apt-get remove -y zabbix-agent
    
  fi

  echo "Zabbix Agent uninstalled successfully."
}

# Execute installation if Zabbix Agent is not installed
install_zabbix_agent() {
  if [ "$DISTRO" == 'centos' ]; then
    install_zabbix_agent_centos
  elif [ "$DISTRO" == 'ubuntu' ]; then
    install_zabbix_agent_ubuntu
  else
    echo "Unsupported operating system."
    exit 1
  fi
}
# Check if Zabbix Agent is already installed
check_zabbix_agent_installed
