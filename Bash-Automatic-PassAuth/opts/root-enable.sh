#!/bin/bash
echo "Locating sshd directory"
cd /etc/ssh/
echo "Deleting default sshd config"
rm sshd_config
echo "Downloding modified sshd config"
curl https://raw.githubusercontent.com/lahirubro123/rootpw-generator/main/opts/sshd_config
echo "Restarting sshd service"
service sshd restart
