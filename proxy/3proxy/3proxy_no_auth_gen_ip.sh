#!/bin/bash
#curl -Ls https://gitlab.com/hungmv/linux/-/raw/main/3proxy/3proxy_no_auth_gen_ip.sh | bash
curl -Ls https://gitlab.com/hungmv/linux/-/raw/main/3proxy/gen_ipv6_vultr.sh | bash 

# read -ra IPv4 <<< $((/sbin/ip -4 -o addr show scope global | awk '{gsub(/\/.*/,"",$4); print $4}') | sed 's/ /\n/g')
readarray -t IPv6 <<< $((/sbin/ip -6 -o addr show scope global | awk '{gsub(/\/.*/,"",$4); print $4}') | sed 's/ /\n/g')


install_3proxy() {
    echo "Installing 3proxy"
	if cat /etc/os-release | grep PRETTY_NAME | grep "CentOS Linux"; then
		wget https://github.com/3proxy/3proxy/releases/download/0.9.4/3proxy-0.9.4.x86_64.rpm > /dev/null 2>&1
		rpm -ivh 3proxy-0.9.4.x86_64.rpm > /dev/null 2>&1
		rm -rf 3proxy-0.9.4.x86_64.rpm
	elif cat /etc/os-release | grep PRETTY_NAME | grep "Ubuntu"; then
		wget https://github.com/3proxy/3proxy/releases/download/0.9.4/3proxy-0.9.4.x86_64.deb > /dev/null 2>&1
		dpkg -i 3proxy-0.9.4.x86_64.deb > /dev/null 2>&1
		rm -rf 3proxy-0.9.4.x86_64.deb
	else
        echo "script does not support this operating system.\n"
        echo ""
        exit 1;
	fi
	wget --no-check-certificate -O /etc/3proxy/adduser.sh https://gitlab.com/hungmv/3proxy-ipv6/-/raw/main/adduser.sh > /dev/null 2>&1
	chmod 755 /etc/3proxy/adduser.sh
    touch /etc/3proxy/passwd 
	touch /etc/3proxy/proxy_ipv6 
	touch /etc/3proxy/counters 
	touch /etc/3proxy/bandlimiters
	
	gen_3proxy_config
	gen_proxy

}
gen_3proxy_config() {

    cat <<EOF > /etc/3proxy/3proxy.cfg
daemon
maxconn 2000
nserver 8.8.8.8
nserver 8.8.4.4
nserver 2001:4860:4860::8888
nserver 2001:4860:4860::8844
nscache 65536
nscache6 65535
timeouts 1 5 30 60 180 1800 15 60
setgid 65535
setuid 65535

# # Allows forwarding of DNS requests
# auth none
# dnspr

# # Set up logs
# log "/var/log/3proxy.log" D
# logformat "- +_L%t.%. %Y-%m-%d  %N.%p %E %U %C:%c %R:%r %O %I %h %T"
# archiver rar rar a -df -inul %A %F
# rotate 30

include /etc/3proxy/proxy_ipv6

EOF
}

gen_proxy() {
	proxy_file="/etc/3proxy/proxy_ipv6"
	data="/root/proxy.txt"
	port=35000
	> $proxy_file
    > $data
	ip4=$(curl -4 ifconfig.io)
	for ip in ${IPv6[@]}; do
		
        echo "proxy -64 -n -a -p${port} -i${ip4} -e${ip}" >> $proxy_file
		echo "flush" >> $proxy_file
		echo "$ip4:$port" >> $data
		iptables -I INPUT -p tcp --dport $port -j ACCEPT
		((port++))
    done
}


echo "installing apps"
WORKDIR="/opt/proxy-data"
install_3proxy	> /dev/null 2>&1
iptables-save > /dev/null 2>&1
ulimit -n 10048	> /dev/null 2>&1
systemctl restart 3proxy > /dev/null 2>&1

echo "bash ${WORKDIR}/boot_iptables.sh" >> /etc/rc.local
echo "ulimit -n 10048" >> /etc/rc.local
echo "systemctl restart 3proxy" >> /etc/rc.local



echo "see proxy connection information at /root/proxy.txt" 