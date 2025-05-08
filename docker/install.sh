#!/bin/bash

set -e

# Lấy tên hệ điều hành
OS=$(grep ^ID= /etc/os-release | cut -d'=' -f2 | tr -d '"')
VERSION_ID=$(grep ^VERSION_ID= /etc/os-release | cut -d'=' -f2 | tr -d '"')

echo "Hệ điều hành phát hiện: $OS $VERSION_ID"

install_docker_ubuntu_debian() {
    sudo apt update
    sudo apt install -y ca-certificates curl gnupg lsb-release

    sudo mkdir -p /etc/apt/keyrings
    curl -fsSL https://download.docker.com/linux/${OS}/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg

    echo \
      "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/${OS} \
      $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

    sudo apt update
    sudo apt install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin

    sudo systemctl enable docker
    sudo systemctl start docker
}

install_docker_centos_rhel() {
    sudo dnf remove -y docker docker-client docker-client-latest docker-common docker-latest \
        docker-latest-logrotate docker-logrotate docker-engine || true

    sudo dnf -y install dnf-plugins-core
    sudo dnf config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo

    sudo dnf install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin

    sudo systemctl enable docker
    sudo systemctl start docker
}

case "$OS" in
    ubuntu|debian)
        install_docker_ubuntu_debian
        ;;
    centos|rhel|rocky|almalinux)
        install_docker_centos_rhel
        ;;
    *)
        echo "Hệ điều hành $OS chưa được hỗ trợ trong script này."
        exit 1
        ;;
esac

echo "✅ Docker đã được cài đặt thành công!"
docker --version
