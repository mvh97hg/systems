
## Firewalld allow/deny country with ipset

Install firewalld
```
sudo apt install firewalld -y
```

Download script setup rule ipset

```
curl -o /usr/local/bin/geoip 
chmod +x /usr/local/bin/geoip
```

Add new replace allow list
```
geoip allow VN
```

Add CC to allow list
```
geoip add allow US
```
Add new replace deny list
```
geoip deny HK
```
Add CC to deny 
```
geoip add deny US
```
## Add firewalld allow/deny rule

```
firewall-cmd --permanent --zone=public \
--add-rich-rule='rule priority=100 family=ipv4 source ipset=allow_cc port port=443  protocol=tcp accept'

firewall-cmd --permanent --zone=public \
--add-rich-rule='rule priority=50 source ipset=deny_cc drop'
```