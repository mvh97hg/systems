#!/bin/bash
green=$(printf '\e[32m')
blue=$(printf '\e[34m')
clear=$(printf '\e[0m')
orange=$(printf '\e[33m')
red=$(printf '\e[31m')
cyan=$(printf '\e[36m')
##
# Color Functions
##

ColorGreen() {
    echo -ne $green$1$clear
}
ColorBlue() {
    echo -ne $blue$1$clear
}
ColorRed() {
    echo -ne $red$1$clear
}
ColorOrange() {
    echo -ne $orange$1$clear
}
ColorCyan() {
    echo -ne $cyan$1$clear
}
# Enable Color - ON/Clear
#
ColorGreen() {
    echo -ne $green$1$clear
}
ColorBlueON() {
    echo -ne $blue
}
ColorRedON() {
    echo -ne $red
}
ColorOrangeON() {
    echo -ne $orange
}
ColorCyanON() {
    echo -ne $cyan
}
ColorClear() {
    echo -ne $clear
}

#Set up
yum -y install epel-release
yum -y update
yum -y groupinstall 'Development Tools'
yum -y install gcc automake autoconf libtool make pam-devel yum-utils openldap-devel openssl-devel
mkdir /opt/ss5
cd /opt/ss5
wget http://sourceforge.net/projects/ss5/files/ss5/3.8.9-8/ss5-3.8.9-8.src.rpm --no-check-certificate
yum-builddep ss5-3.8.9-8.src.rpm
wget http://sourceforge.net/projects/ss5/files/ss5/3.8.9-8/ss5-3.8.9-8.tar.gz --no-check-certificate
tar -zxf ss5-3.8.9-8.tar.gz
cd ss5-3.8.9
./configure
make
make install
cd /etc/opt/ss5/
cp ss5.passwd ss5.passwd.org
cp ss5.conf ss5.conf.org
echo "Enter User use sock "
read User
echo "Enter Password "
read Password
echo "admin admin" >>/etc/opt/ss5/ss5.passwd
echo "$User $Password" >>/etc/opt/ss5/ss5.passwd
chown root.root /etc/opt/ss5/ss5.passwd
chmod 755 /etc/opt/ss5/ss5.passwd
echo "auth 0.0.0.0/0 - u" >>/etc/opt/ss5/ss5.conf
echo "permit u 0.0.0.0/0 - 0.0.0.0/0 - - - - -" >>/etc/opt/ss5/ss5.conf
mkdir /var/run/ss5
chmod 755 /var/run/ss5
# Custom port
# echo -ne "$(ColorRed '---------------------------------------------------------')\n"
echo -ne "$(ColorRed '=============================CUSTOM PORT TO LISTEN FOR PROXY============================')\n"
echo "==================================CHOSE ONE OPTIONS====================================="
echo "==============  0 . Default port (one connecton port 1080)            =================="
echo "==============  1 . Chose one port                                    =================="
echo "==============  2 . Select a range port                               =================="
echo "==============  3 . Setlect the number of port( Start port is 30000)  =================="
echo "========================================================================================"
echo "Chose "
read chose
if [ $chose -eq 0 ]; then
    {

        ss5 -u root -b 0.0.0.0:1080
        service_csf=csf
        service_fwd=firewalld
        service_ip=iptables
        if [ P=$(pgrep $service_csf) != /dev/null ]; then
            { 
                echo "$service_csf is running"
                echo "tcp:in:d=1080:d=0.0.0.0/0" >>/etc/csf/csf.allow
                echo "tcp:out:d=1080:d=0.0.0.0/0" >>/etc/csf/csf.allow
                csf -r
            }
        elif [ P1=$(pgrep $service_fwd) != /dev/null ]; then
            {
                echo "$service_fwd is running"
                firewall-cmd --permanent --zone=public --remove-port=1080/tcp
                firewalld-cmd --reload
            }
        elif [ P2=$(pgrep $service_ip) != /dev/null ]; then
            {
                echo "$service_ip is running"
                iptables -I INPUT -p tcp -m tcp --dport 1080 -j ACCEPT
                service iptables save
                systemctl reload iptables
            }
        fi
    }
elif [ $chose -eq 1 ]; then
    {

        echo "Enter the port you want to use as socks"
        read port
        ss5 -u root -b 0.0.0.0:$port
        service_csf=csf
        service_fwd=firewalld
        service_ip=iptables
        if [ P=$(pgrep $service_csf) != /dev/null ]; then
            {
                echo "$service_csf is running"
                echo "tcp:in:d=$port:d=0.0.0.0/0" >>/etc/csf/csf.allow
                echo "tcp:out:d=$port:d=0.0.0.0/0" >>/etc/csf/csf.allow
                csf -r
            }
        elif [ P1=$(pgrep $service_fwd) != /dev/null ]; then
            {
                echo "$service_fwd is running"
                firewall-cmd --permanent --zone=public --remove-port=$port/tcp
                firewalld-cmd --reload
            }
        elif [ P2=$(pgrep $service_ip) != /dev/null ]; then
            {
                echo "$service_ip is running"
                iptables -I INPUT -p tcp -m tcp --dport $port -j ACCEPT
                service iptables save
                systemctl reload iptables
            }
        fi

    }
elif [ $chose -eq 2 ]; then
    {
        echo "Enter the start port"
        read Sport
        echo " Enter the end port"
        read Eport
        for port in $(seq $Sport $Eport); do
            {
                ss5 -u root -b 0.0.0.0:$port
                service_csf=csf
                service_fwd=firewalld
                service_ip=iptables
                if [ P=$(pgrep $service_csf) != /dev/null ]; then
                    {
                        echo "$service_csf is running"
                        echo "tcp:in:d=$port:d=0.0.0.0/0" >>/etc/csf/csf.allow
                        echo "tcp:out:d=$port:d=0.0.0.0/0" >>/etc/csf/csf.allow
                        csf -r
                    }
                elif [ P1=$(pgrep $service_fwd) != /dev/null ]; then
                    {
                        echo "$service_fwd is running"
                        firewall-cmd --permanent --zone=public --remove-port=$port/tcp
                        firewalld-cmd --reload
                    }
                elif [ P2=$(pgrep $service_ip) != /dev/null ]; then
                    {
                        echo "$service_ip is running"
                        iptables -I INPUT -p tcp -m tcp --dport $port -j ACCEPT
                        service iptables save
                        systemctl reload iptables
                    }
                fi
            }
        done
    }
elif [ $chose -eq 3]; then
    {
        echo " Enter the numbers of port"
        read numberr
        S_port = 30000
        E_port = $(($S_port + $numberr))
        for port in $(seq $S_port $E_port); do
            {
                ss5 -u root -b 0.0.0.0:$port
                service_csf=csf
                service_fwd=firewalld
                service_ip=iptables
                if [ P=$(pgrep $service_csf) != /dev/null ]; then
                    {
                        echo "$service_csf is running"
                        echo "tcp:in:d=$port:d=0.0.0.0/0" >>/etc/csf/csf.allow
                        echo "tcp:out:d=$port:d=0.0.0.0/0" >>/etc/csf/csf.allow
                        csf -r
                    }
                elif [ P1=$(pgrep $service_fwd) != /dev/null ]; then
                    {
                        echo "$service_fwd is running"
                        firewall-cmd --permanent --zone=public --remove-port=$port/tcp
                        firewalld-cmd --reload
                    }
                elif [ P2=$(pgrep $service_ip) != /dev/null ]; then
                    {
                        echo "$service_ip is running"
                        iptables -I INPUT -p tcp -m tcp --dport $port -j ACCEPT
                        service iptables save
                        systemctl reload iptables
                    }
                fi
            }
        done
    }
fi
# RUN
chmod 755 /etc/init.d/ss5
systemctl deamon-reload
service ss5 restart
# set UP HTTPD Console
yum install httpd -y
cd /opt/ss5/ss5-3.8.9
cp /opt/ss5/ss5-3.8.9/modules/mod_statistics/statmgr.cgi /var/www/cgi-bin/
cp /opt/ss5/ss5-3.8.9/modules/mod_balance/balamgr.cgi /var/www/cgi-bin/
chmod +x /var/www/cgi-bin/*
cp /opt/ss5/ss5-3.8.9/modules/mod_balance/SS5Logo.jpg /var/www/html/
echo "set SS5_CONSOLE" >>/etc/opt/ss5/ss5.conf
echo -ne "$(ColorYellow 'SETUP PROXY COMPLETE')"
echo "THEO DOI PROXY THONG QUA"
echo "<IP>/cgi-bin/statmgr.cgi"
echo "<IP>/cgi-bin/balamgr.cgi"
netstat -ntlp | grep ss5
