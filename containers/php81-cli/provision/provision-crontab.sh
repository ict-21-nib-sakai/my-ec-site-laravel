#!/bin/sh

PHP_CLI_USER_NAME=app-user

# Prepare log directory and files.
mkdir -p  /home/"${PHP_CLI_USER_NAME}"/log/crond
touch     /home/"${PHP_CLI_USER_NAME}"/log/crond/info.log
chmod 644 /home/"${PHP_CLI_USER_NAME}"/log/crond/info.log
touch     /home/"${PHP_CLI_USER_NAME}"/log/crond/error.log
chmod 644 /home/"${PHP_CLI_USER_NAME}"/log/crond/error.log
chown -R "${PHP_CLI_USER_NAME}":"${PHP_CLI_USER_NAME}" /home/"${PHP_CLI_USER_NAME}"/log

# Put cron schedule file.
if [ -f "/tmp/conf/etc/crontabs/${PHP_CLI_USER_NAME}" ]; then
  cp -f /tmp/conf/etc/crontabs/"${PHP_CLI_USER_NAME}"         /etc/crontabs/"${PHP_CLI_USER_NAME}"
else
  cp -f /tmp/conf/etc/crontabs/"${PHP_CLI_USER_NAME}".default /etc/crontabs/"${PHP_CLI_USER_NAME}"
fi

chmod 600 /etc/crontabs/"${PHP_CLI_USER_NAME}"
chown "${PHP_CLI_USER_NAME}":"${PHP_CLI_USER_NAME}" /etc/crontabs/"${PHP_CLI_USER_NAME}"

# Delete default cron schedule file.
rm -f /etc/crontabs/root