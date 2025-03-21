#!/bin/bash
### /etc/csf/csfpost.sh
# Masquerading (NAT)
iptables -t nat -A POSTROUTING -o eth0 -j MASQUERADE

# Allow docker0 interface
iptables -I INPUT -i docker0 -j ACCEPT
iptables -I FORWARD -i docker0 -j ACCEPT