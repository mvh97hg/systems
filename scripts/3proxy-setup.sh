#/bin/bash

set -e

readarray -t IPv4 <<< $((/sbin/ip -4 -o addr show scope global | awk '{gsub(/\/.*/,"",$4); print $4}') | sed 's/ /\n/g')

install_3proxy() {
    echo "Installing 3proxy"
	if cat /etc/os-release | grep PRETTY_NAME | grep "CentOS Linux"; then
		curl -O https://github.com/3proxy/3proxy/releases/download/0.9.5/3proxy-0.9.5.x86_64.rpm > /dev/null 2>&1
		rpm -ivh 3proxy-0.9.5.x86_64.rpm > /dev/null 2>&1
		rm -rf 3proxy-0.9.5.x86_64.rpm
	elif cat /etc/os-release | grep PRETTY_NAME | grep "Ubuntu"; then
		curl -O https://github.com/3proxy/3proxy/releases/download/0.9.5/3proxy-0.9.5.x86_64.deb > /dev/null 2>&1
		dpkg -i 3proxy-0.9.5.x86_64.deb > /dev/null 2>&1
		rm -rf 3proxy-0.9.5.x86_64.deb
	elif cat /etc/os-release | grep PRETTY_NAME | grep "Debian"; then
		curl -O https://github.com/3proxy/3proxy/releases/download/0.9.5/3proxy-0.9.5.x86_64.deb > /dev/null 2>&1
		dpkg -i 3proxy-0.9.5.x86_64.deb > /dev/null 2>&1
		rm -rf 3proxy-0.9.5.x86_64.deb
	else
        echo "script does not support this operating system.\n"
        echo ""
        exit 1;
	fi
	
    touch /etc/3proxy/passwd 
	touch /etc/3proxy/proxy_http 
	touch /etc/3proxy/counters 
	touch /etc/3proxy/bandlimiters
	
	script_adduser
	gen_3proxy_config
	gen_proxy

}

script_adduser(){
	file="/etc/3proxy/adduser.sh"
	cat <<"EOF" > $file
#/bin/bash
if [ $4 ]; then
        echo bandlimin $4 $1 >> /etc/3proxy/bandlimiters
fi
if [ $3 ]; then
        echo countin \"`wc -l /etc/3proxy/counters|awk '{print $1}'`/$1\" D $3 $1 >> /etc/3proxy/conf/counters
fi
if [ $2 ]; then
        echo $1:`/bin/mycrypt $$ $2` >> /etc/3proxy/passwd
else
        echo usage: $0 username password [day_limit] [bandwidth]
        echo "  "day_limit - traffic limit in MB per day
        echo "  "bandwidth - bandwith in bits per second 1048576 = 1Mbps
fi
EOF

	chmod +x $file
}

gen_3proxy_config() {

    cat <<EOF > /etc/3proxy/3proxy.cfg
service
#daemon
maxconn 500
nscache 65535
nscache6 65535
nserver 2001:4860:4860::8888
nserver 2001:4860:4860::8844
nserver 8.8.8.8
nserver 8.8.4.4

timeouts 1 5 30 60 180 1800 15 60
setgid 65535
setuid 65535

#log @/var/log/3proxy/3proxy.log D
#logformat "- +_G%d-%m-%Y %H:%M:%S %E %U %N %I %O %C %T DIRECT/%R"
#rotate 30

#limit 100 Mbps
#bandlimin 100000000
#bandlimout 100000000

users $/etc/3proxy/passwd
#include /etc/3proxy/counters
#include /etc/3proxy/bandlimiters

authcache user 60
auth strong cache
deny * * 127.0.0.1

include /etc/3proxy/proxy_http
force
EOF
}

generate_unique_port() {
    local port
    while :; do
        port=$((RANDOM % 65535 + 10024))

        if ! ss -ltn | awk '{print $4}' | grep -q ":$port$"; then
            if [[ ! " ${ports[@]} " =~ " ${port} " ]]; then
                ports+=($port)
                echo $port
                return
            fi
        fi
    done
}
declare -a ports=()
declare -a config=()

gen_proxy() {

	> $proxy_file
    > $data

	proxy=""
	for ip in ${IPv4[@]}; do
		username=$(tr -dc a-z </dev/urandom | head -c 8)
		password=$(tr -dc a-z </dev/urandom | head -c 12)

		/etc/3proxy/adduser.sh $username $password

		port=$(generate_unique_port)

		config+="allow $username\n"
		config+="proxy -n -a -p${port} -i${ip} -e${ip}\n"
		config+="flush\n\n"

		proxy+="${ip}:${port}:${username}:${password}\n"

		((port++))
    done
	echo -e $config > /etc/3proxy/proxy_http
	echo -e $proxy > /root/proxy.txt
}

echo "Install...."
install_3proxy > /dev/null 2>&1

systemctl restart 3proxy > /dev/null 2>&1
systemctl enable 3proxy > /dev/null 2>&1
systemctl status 3proxy