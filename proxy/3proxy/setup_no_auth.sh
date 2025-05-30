#!/bin/bash

readarray -t IPv4 <<< $((/sbin/ip -4 -o addr show scope global | awk '{gsub(/\/.*/,"",$4); print $4}') | sed 's/ /\n/g')
readarray -t IPv6 <<< $((/sbin/ip -6 -o addr show scope global | awk '{gsub(/\/.*/,"",$4); print $4}') | sed 's/ /\n/g')


install_3proxy() {
    echo "Installing 3proxy"
	if cat /etc/os-release | grep PRETTY_NAME | grep "CentOS Linux 7"; then
		wget https://github.com/3proxy/3proxy/releases/download/0.9.4/3proxy-0.9.4.x86_64.rpm 
		rpm -ivh 3proxy-0.9.4.x86_64.rpm
		rm -rf 3proxy-0.9.4.x86_64.rpm
	elif cat /etc/os-release | grep PRETTY_NAME | grep "Ubuntu"; then
		wget https://github.com/3proxy/3proxy/releases/download/0.9.4/3proxy-0.9.4.x86_64.deb
		dpkg -i 3proxy-0.9.4.x86_64.deb
		rm -rf 3proxy-0.9.4.x86_64.deb
	else
        echo "script does not support this operating system.\n"
        echo ""
        exit 1;
	fi
	wget --no-check-certificate -O /etc/3proxy/adduser.sh https://gitlab.com/hungmv/3proxy-ipv6/-/raw/main/adduser.sh 
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

total_ipv6=$(/sbin/ip -6 -o addr show scope global | awk '{gsub(/\/.*/,"",$4); print $4}' | wc -l)

declare -a unique_port

function is_port_unique {
  local number_to_check=$1
  for num in "${unique_port[@]}"; do
    if [ "$num" -eq "$number_to_check" ]; then
      return 1
    fi
  done
  return 0
}

# Tạo các số ngẫu nhiên và đảm bảo rằng chúng là duy nhất
while [ ${#unique_port[@]} -lt $total_ipv6 ]; do
  random_number=$((RANDOM % 65001 + 10000))
  if is_port_unique "$random_number"; then
    unique_port+=("$random_number")
  fi
done

gen_proxy() {
	proxy_config="/etc/3proxy/proxy_ipv6"
	data="/root/proxy.txt"
	
	> $proxy_file
    > $data
	config=""
	proxy=""
	for ((i = 0; i < $total_ipv6; i++)); do
		config+="proxy -6 -a -n -p${unique_port[i]} -i${IPv4[1]} -e${IPv6[i]}\n"
		proxy+="$IPv4:${unique_port[i]}"
		iptables -I INPUT -p tcp --dport ${unique_port[i]} -j ACCEPT
	done
	echo -e $config > $proxy_config
	echo -e $proxy > $data
}


echo "installing apps"

install_3proxy 
iptables-save 
ulimit -n 10048
systemctl restart 3proxy

echo "see proxy connection information at /root/proxy.txt" 