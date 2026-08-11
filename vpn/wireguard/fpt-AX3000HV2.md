
# Cấu hình wireguard trên modem FPT AX3000HV2
```
curl "http://192.168.1.1/cgi-bin/telnetenable.cgi?telnetenable=1"
```
## Login với telnet
```
telnet 192.168.1.1
# OpenWrt login: admin
# Password: hbmt@_fpt
```
## custom nếu muốn login với ssh
```

mv /bin/login /bin/login.bak; printf "#!/bin/sh\nexec /bin/sh -l\n" > /bin/login; chmod +x /bin/login
```

## Cấu hình wireguard
```
uci set network.wg0='interface'
uci set network.wg0.proto='wireguard'
uci set network.wg0.private_key='private_key'
uci add_list network.wg0.addresses='172.16.31.10/24'
uci set network.wg0.defaultroute='0'
uci set network.wg0.peerdns='0'

uci add network wireguard_wg0
uci set network.@wireguard_wg0[-1].description='wg-server'
uci set network.@wireguard_wg0[-1].public_key='public_key='
uci set network.@wireguard_wg0[-1].endpoint_host='endpoint_host'
uci set network.@wireguard_wg0[-1].endpoint_port='endpoint_port'
uci set network.@wireguard_wg0[-1].persistent_keepalive='25'
network.@wireguard_wg0[0].route_allowed_ips='1'
uci add_list network.@wireguard_wg0[0].allowed_ips='0.0.0.0/0'
uci add_list network.@wireguard_wg0[0].allowed_ips='::/0'

uci commit network
ifdown wg0 && ifup wg0

uci add firewall zone
uci set firewall.@zone[-1].name='wg'
uci add_list firewall.@zone[-1].network='wg0'
uci set firewall.@zone[-1].input='ACCEPT'
uci set firewall.@zone[-1].output='ACCEPT'
uci set firewall.@zone[-1].forward='ACCEPT'
uci set firewall.@zone[-1].masq='1'
uci set firewall.@zone[-1].mtu_fix='1'

uci add firewall forwarding
uci set firewall.@forwarding[-1].src='lan'
uci set firewall.@forwarding[-1].dest='wg'

uci commit firewall
/etc/init.d/firewall restart

```

## Bật giao diện Openwrt

```
uci set uhttpd.main.active='1'
uci commit uhttpd
/etc/init.d/uhttpd restart
```