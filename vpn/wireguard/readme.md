
### Create server key
```
wg genkey | tee /etc/wireguard/server.key | wg pubkey > /etc/wireguard/server.pub
sysctl -w net.ipv6.conf.all.forwarding=1
sysctl -w net.ipv4.ip_forward=1

```
### Config server wg0.conf
```
[Interface]
Address = 10.10.50.1/26
ListenPort = 51820
PrivateKey = 

PostUp = iptables -A FORWARD -i wg0 -j ACCEPT; iptables -A FORWARD -o wg0 -j ACCEPT; iptables -t nat -A POSTROUTING -o eth0 -j MASQUERADE
#PostUp = iptables6 -A FORWARD -i wg0 -j ACCEPT; iptables6 -A FORWARD -o wg0 -j ACCEPT; iptables6 -t nat -A POSTROUTING -o eth0 -j MASQUERADE
PostDown = iptables -D FORWARD -i wg0 -j ACCEPT; iptables -D FORWARD -o wg0 -j ACCEPT; iptables -t nat -D POSTROUTING -o eth0 -j MASQUERADE
#PostDown = iptables6 -D FORWARD -i wg0 -j ACCEPT; iptables6 -D FORWARD -o wg0 -j ACCEPT; iptables6 -t nat -D POSTROUTING -o eth0 -j MASQUERADE

[Peer]
PublicKey = 
Endpoint = 
AllowedIPs = 10.10.50.2/32
PersistentKeepalive = 25
```
### Script create peer
```
#!/bin/bash

WG_IF=wg0
WG_NET=10.10.50
SUB_NET=26
WG_PORT=51820
SERVER_PUB_KEY=$(wg show wg0 public-key)
SERVER_ENDPOINT=192.168.1.2

CLIENT_NAME=$1
CLIENT_IP=$2
DIR="/etc/wireguard/clients/$CLIENT_NAME"
mkdir -p $DIR
#cd clients/$CLIENT_NAME
PRI_KEY="$DIR/private.key"
PUB_KEY="$DIR/public.key"
wg genkey | tee ${PRI_KEY} | wg pubkey > ${PUB_KEY}

cat > ${DIR}/${CLIENT_NAME}.conf <<EOF
[Interface]
PrivateKey = $(cat ${PRI_KEY})
Address = ${WG_NET}.${CLIENT_IP}/${SUB_NET}
DNS = 8.8.8.8

[Peer]
PublicKey = ${SERVER_PUB_KEY}
Endpoint = ${SERVER_ENDPOINT}:${WG_PORT}
AllowedIPs = 0.0.0.0/0
PersistentKeepalive = 25
EOF

echo "[Peer]
PublicKey = $(cat ${PUB_KEY})
AllowedIPs = ${WG_NET}.${CLIENT_IP}/32" >> /etc/wireguard/${WG_IF}.conf

wg syncconf ${WG_IF} <(wg-quick strip ${WG_IF})

echo "Client ${CLIENT_NAME} created"
```

```
wg syncconf wg0 <(wg-quick strip wg0)
```