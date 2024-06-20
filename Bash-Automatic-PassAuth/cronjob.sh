#!/bin/bash

echo "Installing Crobtab"
apt-get update && apt-get upgrade
apt-get install cron
echo "Locating crontab directory"
cd /var/spool/cron/crontabs
echo ""

echo ""
echo "Deleting default corntab config"
rm root
echo ""

echo ""
echo "Downloding modified crontab config"
echo ""
wget https://raw.githubusercontent.com/chnthkksn/Orcale-things/main/opts/root

echo ""
echo "Setup completed successfully"
echo ""
