#!/bin/bash
set -e
mkdir node_exporter && cd node_exporter
curl -Ls https://github.com/prometheus/node_exporter/releases/download/v1.9.0/node_exporter-1.9.0.linux-amd64.tar.gz | tar --strip-components 1 -xz

mv node_exporter /usr/local/bin/node_exporter

cd ../ && rm -rf node_exporter
useradd --no-create-home --shell /bin/false node_exporter


cat > /etc/systemd/system/node_exporter.service <<EOF
[Unit]
Description=Node Exporter
Wants=network-online.target
After=network-online.target

[Service]
User=node_exporter
Group=node_exporter
Type=simple
ExecStart=/usr/local/bin/node_exporter
Restart=always
RestartSec=3

[Install]
WantedBy=multi-user.target
EOF

systemctl daemon-reload
systemctl start node_exporter.service
systemctl enable node_exporter.service
