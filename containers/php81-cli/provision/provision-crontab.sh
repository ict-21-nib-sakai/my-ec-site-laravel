#!/bin/sh

# Prepare log directory and files.
mkdir -p  /var/log/crond
touch     /var/log/crond/info.log
chmod 644 /var/log/crond/info.log
touch     /var/log/crond/error.log
chmod 644 /var/log/crond/error.log

# Put cron schedule file.
if [ -f "/tmp/conf/etc/crontabs/root" ]; then
  cp -f /tmp/conf/etc/crontabs/root         /etc/crontabs/root
else
  cp -f /tmp/conf/etc/crontabs/root.default /etc/crontabs/root
fi
chmod 600 /etc/crontabs/root