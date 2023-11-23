#!/bin/sh

echo "How many proxy do you want to create? Example 100"
read COUNT
echo "IPv6 network interface? Example ens4"
read ETH
TEMP=`/sbin/ip -6 addr | grep inet6 | awk -F '[ \t]+|/' '{print $3}' | grep -v ^::1 | grep -v ^fe80 | cut -f1-4 -d':'`
SUBNET=`ifconfig | grep $TEMP | awk '{print $4}'`

random() {
	tr </dev/urandom -dc A-Za-z0-9 | head -c5
	echo
}

array=(1 2 3 4 5 6 7 8 9 0 a b c d e f)
prefix=`echo "${array[$RANDOM % 16]}${array[$RANDOM % 16]}${array[$RANDOM % 16]}${array[$RANDOM % 16]}"`
gen64() {
	ip64() {
		echo "${array[$RANDOM % 16]}${array[$RANDOM % 16]}${array[$RANDOM % 16]}${array[$RANDOM % 16]}"
	}
	echo "$1:$prefix:$(ip64):$(ip64):$(ip64)"
}
gen69() {
        ip64() {
                echo "${array[$RANDOM % 16]}${array[$RANDOM % 16]}${array[$RANDOM % 16]}${array[$RANDOM % 16]}"
        }
        echo "$1:$prefix:$(ip64):$(ip64)"
}

install_3proxy() {
    echo "Installing 3proxy"
    URL="https://raw.githubusercontent.com/hautph/vinahost/main/3proxy-0.9.4.tar.gz"
    wget -qO- $URL | bsdtar -xvf-
    mv 3proxy-0.9.4 3proxy
    cd 3proxy
    make -f Makefile.Linux
    mkdir -p /etc/3proxy/{bin,logs,stat}
    cp ./bin/3proxy /bin/3proxy
    cp ./scripts/init.d/3proxy.sh /etc/init.d/3proxy
    chmod +x /etc/init.d/3proxy
    chkconfig 3proxy on
    cd $WORKDIR
}

gen_3proxy() {
    cat <<EOF
	daemon
	maxconn 1000
	nscache 65536
	timeouts 1 5 30 60 180 1800 15 60
	setgid 65535
	setuid 65535
	flush
	auth strong

	users $(awk -F "/" 'BEGIN{ORS="";} {print $1 ":CL:" $2 " "}' ${WORKDATA})

	$(awk -F "/" '{print "auth iponly\n" \
	"#allow " $1 "\n" \
	"proxy -6 -n -a -p" $4 " -i" $3 " -e"$5"\n" \
	"flush\n"}' ${WORKDATA})
EOF
}

gen_proxy_file_for_user() {
    cat >proxy.txt <<EOF
	$(awk -F "/" '{print $3 ":" $4 }' ${WORKDATA})
EOF
}

gen_data() {
    seq $FIRST_PORT $LAST_PORT | while read port; do
	if [ $SUBNET -eq 64 ]
	then
		echo "usr$(random)/pass$(random)/$IP4/$port/$(gen64 $IP6)"
	elif [ $SUBNET -eq 69 ]
	then
		echo "usr$(random)/pass$(random)/$IP4/$port/$(gen69 $IP6)"
	fi
    done
}

gen_iptables() {
    cat <<EOF
    $(awk -F "/" '{print "iptables -I INPUT -p tcp --dport " $4 "  -m state --state NEW -j ACCEPT"}' ${WORKDATA}) 
EOF
}

gen_ifconfig() {
	while read line
	do
		ipv6=`echo $line | cut -d"/" -f5`
		echo "ifconfig $ETH inet6 add $ipv6/$SUBNET"
	done < ${WORKDATA}
}

echo "installing apps"
yum -y install gcc net-tools bsdtar zip psmisc iptables-services >/dev/null

install_3proxy

echo "working folder = /home/vinahost"
WORKDIR="/home/vinahost"
WORKDATA="${WORKDIR}/data.txt"
mkdir $WORKDIR && cd $_

/usr/sbin/ifdown $ETH
/usr/sbin/ifup $ETH

echo "Checking ipv4 & ipv6"

IP4=$(curl -4 -s icanhazip.com)

if [ $SUBNET -eq 64 ]
then
	IP6=$(/sbin/ip -6 addr | grep inet6 | awk -F '[ \t]+|/' '{print $3}' | grep -v ^::1 | grep -v ^fe80 | cut -f1-4 -d':')
elif [ $SUBNET -eq 69 ]
then
	IP6=$(/sbin/ip -6 addr | grep inet6 | awk -F '[ \t]+|/' '{print $3}' | grep -v ^::1 | grep -v ^fe80 | cut -f1-5 -d':')
fi

echo "Internal ip = ${IP4}. External sub for ip6 = ${IP6}"

FIRST_PORT=30000
LAST_PORT=$(($FIRST_PORT + $COUNT))

gen_data >$WORKDIR/data.txt
gen_iptables >$WORKDIR/boot_iptables.sh
gen_ifconfig >$WORKDIR/boot_ifconfig.sh
#chmod +x boot_*.sh /etc/rc.local

gen_3proxy >/etc/3proxy/3proxy.cfg

cat >>/etc/rc.local <<EOF
bash ${WORKDIR}/boot_iptables.sh
bash ${WORKDIR}/boot_ifconfig.sh
ulimit -n 10048
service 3proxy start
EOF

bash /etc/rc.local

gen_proxy_file_for_user
