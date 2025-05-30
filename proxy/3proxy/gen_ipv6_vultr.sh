#!/bin/sh
random() {
	tr </dev/urandom -dc A-Za-z0-9 | head -c5
	echo
}

array=(1 2 3 4 5 6 7 8 9 0 a b c d e f)
gen64() {
	ip64() {
		echo "${array[$RANDOM % 16]}${array[$RANDOM % 16]}${array[$RANDOM % 16]}${array[$RANDOM % 16]}"
	}
	echo "$1:$(ip64):$(ip64):$(ip64):$(ip64)"
}

gen_data() {
    for ((i=1; i<=$COUNT; i++)); do
        #echo "$(gen64 $IP6)"
        echo "ifconfig eth0 inet6 add $(gen64 $IP6)/64"
    done
}

yum -y install gcc net-tools bsdtar zip >/dev/null

WORKDIR="/opt/proxy-data"
mkdir -p $WORKDIR && cd $_

IP4=$(curl -4 -s icanhazip.com)
IP6=$(curl -6 -s icanhazip.com | cut -f1-4 -d':')

echo "Internal ip = ${IP4}. Exteranl sub for ip6 = ${IP6}"

# echo "How many proxy do you want to create? Example 500"
# read COUNT
COUNT=500
gen_data >$WORKDIR/boot_ifconfig.sh

chmod +x ${WORKDIR}/boot_*.sh /etc/rc.local
cat >>/etc/rc.local <<EOF
bash ${WORKDIR}/boot_ifconfig.sh
EOF

bash /etc/rc.local

