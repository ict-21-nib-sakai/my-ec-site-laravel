#!/bin/sh

PHP_CLI_USER_NAME=app-user

# Prepare log directory and files.
mkdir -p  /home/"${PHP_CLI_USER_NAME}"/log/laravel-worker
touch     /home/"${PHP_CLI_USER_NAME}"/log/laravel-worker/worker.log
chmod 644 /home/"${PHP_CLI_USER_NAME}"/log/laravel-worker/worker.log
touch     /home/"${PHP_CLI_USER_NAME}"/log/laravel-worker/error.log
chmod 644 /home/"${PHP_CLI_USER_NAME}"/log/laravel-worker/error.log
chown -R "${PHP_CLI_USER_NAME}":"${PHP_CLI_USER_NAME}" /home/"${PHP_CLI_USER_NAME}"/log

# Put a supervisord configuration file.
if [ -f "/tmp/conf/etc/supervisord.conf" ]; then 
  cp -f /tmp/conf/etc/supervisord.conf         /etc/supervisord.conf
else
  cp -f /tmp/conf/etc/supervisord.default.conf /etc/supervisord.conf
fi

chmod 644 /etc/supervisord.conf
chown "${PHP_CLI_USER_NAME}":"${PHP_CLI_USER_NAME}" /etc/supervisord.conf