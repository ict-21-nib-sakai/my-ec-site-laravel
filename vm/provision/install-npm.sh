#!/bin/sh

dnf install -y nodejs
npm install -g n
/usr/local/bin/n 17.1.0

rm /home/vagrant/sync/code/node_modules
cd /home/vagrant/sync/code || exit
sudo -u vagrant npm install sh
sudo -u vagrant npm install mix