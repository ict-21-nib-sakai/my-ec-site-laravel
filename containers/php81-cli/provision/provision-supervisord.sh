#!/bin/sh

# Prepare log directory and files.
mkdir -p  /var/log/laravel-worker
touch     /var/log/laravel-worker/worker.log
chmod 644 /var/log/laravel-worker/worker.log
touch     /var/log/laravel-worker/error.log
chmod 644 /var/log/laravel-worker/error.log

# Put a supervisord configuration file.
if [ -f "/tmp/conf/etc/supervisord.conf" ]; then 
  cp -f /tmp/conf/etc/supervisord.conf         /etc/supervisord.conf
else
  cp -f /tmp/conf/etc/supervisord.default.conf /etc/supervisord.conf
fi
chmod 600 /etc/supervisord.conf