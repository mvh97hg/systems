#!/bin/bash
file1="/etc/exim/staticroutes"
file2="/etc/exim/access"
function sendgird {
pass1="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"
count1=`grep $domain $file1 | wc -l`
count2=`grep $domain $file2 | wc -l`
	if [ $count1 -eq 0 ]
	then
        	echo "$domain:smtp.sendgrid.net::587" >> $file1
		grep $domain $file1
	else
		echo "Domain has been overwritten"
		sed -i '/'$domain'/,1 d' $file1
		echo "$domain:smtp.sendgrid.net::587" >> $file1
		grep $domain $file1
	fi

	if [ $count2 -eq 0 ]
	then
        	echo "$domain user=apikey pass=$pass1" >> $file2
		grep $domain $file2
		echo "The configuration was successful!!!"
	else
        	sed -i '/'$domain'/,1 d' $file2
		echo "$domain user=apikey pass=$pass1" >> $file2
		grep $domain $file2
		echo "The configuration was successful!!!"
	fi
}

function smtp2go {
user2="smtp2go_vinarelay"
pass2="gu4wUGlTLEhIWtsL"
count3=`grep $domain $file1 | wc -l`
count4=`grep $domain $file2 | wc -l`

        if [ $count3 -eq 0 ]
        then
                echo "$domain:mail.smtp2go.com::2525" >> $file1
                grep $domain $file1
        else
                echo "Domain has been overwritten"
		sed -i '/'$domain'/,1 d' $file1
		echo "$domain:mail.smtp2go.com::2525" >> $file1
		grep $domain $file1
        fi

        if [ $count4 -eq 0 ]
        then
                echo "$domain user=$user2 pass=$pass2" >> $file2
                grep $domain $file2
		echo "The configuration was successful!!!"
        else
                sed -i '/'$domain'/,1 d' $file2
		echo "$domain user=$user2 pass=$pass2" >> $file2
		grep $domain $file2
		echo "The configuration was successful!!!"
        fi
}
function relay-da01 {
user3="emailrelay"
pass3="Vinahost@789"
count5=`grep $domain $file1 | wc -l`
count6=`grep $domain $file2 | wc -l`

        if [ $count5 -eq 0 ]
        then
                echo "$domain:relay-da01.vinahost.vn::587" >> $file1
                grep $domain $file1
        else
                echo "Domain has been overwritten"
                sed -i '/'$domain'/,1 d' $file1
                echo "$domain:relay-da01.vinahost.vn::587" >> $file1
                grep $domain $file1
        fi

        if [ $count6 -eq 0 ]
        then
                echo "$domain user=$user3 pass=$pass3" >> $file2
                grep $domain $file2
                echo "The configuration was successful!!!"
        else
                sed -i '/'$domain'/,1 d' $file2
                echo "$domain user=$user3 pass=$pass3" >> $file2
                grep $domain $file2
                echo "The configuration was successful!!!"
        fi
}

function remove_routing {
	if cat /etc/exim/staticroutes | grep "$domain" >& /dev/null; then
		sed -i '/'$domain'/,1 d' $file1
		sed -i '/'$domain'/,1 d' $file2
		echo "Domain $domain has been removed routing"
	else
		echo "Domain $domain hasn't been routed. Please check again"
	fi
}

function menu {
echo "1) Relay through sendgird"
echo "2) Relay through smtp2go"
echo "3) Relay through relay-da01"
echo "4) Remove routing"
echo "5) Exit"
read -p "Please choose the option: " choice
case $choice in
1) sendgird ;;
2) smtp2go ;;
3) relay-da01 ;;
4) remove_routing ;;
*) exit ;;
esac
}
clear
echo "
██████╗░███████╗██╗░░░░░░█████╗░██╗░░░██╗  ████████╗░█████╗░░█████╗░██╗░░░░░
██╔══██╗██╔════╝██║░░░░░██╔══██╗╚██╗░██╔╝  ╚══██╔══╝██╔══██╗██╔══██╗██║░░░░░
██████╔╝█████╗░░██║░░░░░███████║░╚████╔╝░  ░░░██║░░░██║░░██║██║░░██║██║░░░░░
██╔══██╗██╔══╝░░██║░░░░░██╔══██║░░╚██╔╝░░  ░░░██║░░░██║░░██║██║░░██║██║░░░░░
██║░░██║███████╗███████╗██║░░██║░░░██║░░░  ░░░██║░░░╚█████╔╝╚█████╔╝███████╗
╚═╝░░╚═╝╚══════╝╚══════╝╚═╝░░╚═╝░░░╚═╝░░░  ░░░╚═╝░░░░╚════╝░░╚════╝░╚══════╝
"
echo "*********************************************************************"
echo "* Code by: ViVi                                                     *"
echo "* Gitlab: https://gitlab.vinahost.vn/vint                           *"
echo "*********************************************************************"
read -p "Please enter domain: " domain
a=`grep $domain $file1`
if cat /etc/domainusers | grep -w "$domain" >& /dev/null; then
    if [ -z $a ]
    then	
	echo ""
        echo "The $domain domain has not been routed !!!"
	echo ""
        menu
    else
	echo ""
        echo "The $domain domain has been routed"
	echo $a
	echo ""
	menu
    fi
else
    echo "Domain $domain does not exist"
fi