#/bin/bash
zmhostname=`hostname`

function menu {
echo "1) Configure Relay"
echo "2) Remove Routing"
echo "3) Exit"
read -p "Please choose the option: " choice
case $choice in
1) configure_relay ;;
2) remove_routing ;;
*) exit ;;
esac
}

function configure_relay {
    read -p "smtp_relay_server: " srv
    read -p "port: " port
    read -p "user: " user
    read -p "password: " pass
    echo $srv $user:$pass > /opt/zimbra/conf/relay_password
    su - zimbra -c "postmap /opt/zimbra/conf/relay_password"
    su - zimbra -c "postmap -q $srv /opt/zimbra/conf/relay_password"
    su - zimbra -c "zmprov ms $zmhostname zimbraMtaSmtpSaslPasswordMaps lmdb:/opt/zimbra/conf/relay_password"
    su - zimbra -c "zmprov ms $zmhostname zimbraMtaSmtpSaslAuthEnable yes"
    su - zimbra -c "zmprov ms $zmhostname zimbraMtaSmtpCnameOverridesServername no"
    su - zimbra -c "zmprov ms $zmhostname zimbraMtaSmtpTlsSecurityLevel may"
    su - zimbra -c "zmprov ms $zmhostname zimbraMtaSmtpSaslSecurityOptions noanonymous"
    su - zimbra -c "zmprov ms $zmhostname zimbraMtaRelayHost $srv:$port"
    su - zimbra -c "postfix reload"
    echo "Relay configuration was successful!!!"
}


function remove_routing {
    su - zimbra -c "zmprov ms $zmhostname zimbraMtaRelayHost ''"
    su - zimbra -c "postfix reload"
    echo "Remove Relay configuration was successful!!!"
}
menu