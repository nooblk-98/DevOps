#!/bin/bash
sudo wget -P /etc/sshfix https://raw.githubusercontent.com/lahirubro123/rootpw-generator/main/sshexpirefix.sh
sudo chmod +x /etc/sshfix/sshexpirefix.sh
sudo crontab -l > tempfile
echo "@reboot /etc/sshfix/sshexpirefix.sh" >> tempfile
echo "@reboot iptables -F" >> tempfile
sudo crontab tempfile
rm tempfile
