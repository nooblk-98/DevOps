#!/bin/bash

apt-get update && apt-get upgrade


echo -e "ATTENTION!!"
echo " "
echo -e "This password will be used to log into your server."
echo -e "Enter Your New Password to Continue...!"
read  -p : pass
(echo $pass; echo $pass)|passwd 2>/dev/null
sleep 1s
echo -e "\033[1;31mPASSWORD CHANGED SUCCESSFULLY!\033[0m"
sleep 5s
cd
clear

sleep 3

sudo sed -i 's/PasswordAuthentication no/PasswordAuthentication yes/' /etc/ssh/sshd_config

sleep 1

sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
sed -i 's/PubkeyAuthentication yes/PubkeyAuthentication no/' /etc/ssh/sshd_config

sleep 3

sudo service ssh restart
sudo service sshd restart

