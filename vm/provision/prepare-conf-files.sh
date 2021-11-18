#!/bin/sh

CURRENT_DIRECTORY=`pwd`

# Prepare a ".env" from ".env.example" for Docker Containers.
#  - PHP 8.1 CLI
#  - PHP 8.1 Apache
cd ${CURRENT_DIRECTORY}/../../containers
if [ ! -f ".env" ]; then cp .env.example .env ; fi

# Prepare mysql conf files.
#  - MySQL 8.0
cd ${CURRENT_DIRECTORY}/../../containers/mysql/conf/etc/mysql
if [ ! -f "my.cnf" ];            then cp my.development.cnf            my.cnf ; fi
if [ ! -f "conf.d/mysql.cnf" ];  then cp conf.d/mysql.development.cnf  conf.d/mysql.cnf  ; fi
if [ ! -f "conf.d/docker.cnf" ]; then cp conf.d/docker.development.cnf conf.d/docker.cnf ; fi

# Prepare a crontab file.
#  - PHP 8.1 CLI
cd ${CURRENT_DIRECTORY}/../../containers/php81-cli/conf/etc/crontabs
if [ ! -f "root" ]; then cp root.example root ; fi

# Prepare a supervisord.conf file.
#  - PHP 8.1 CLI
cd ${CURRENT_DIRECTORY}/../../containers/php81-cli/conf/etc
if [ ! -f "supervisord.conf" ]; then cp supervisord.example.conf supervisord.conf ; fi

# Prepare a php.ini file.
#  - PHP 8.1 Apache
cd ${CURRENT_DIRECTORY}/../../containers/php81-apache/conf/usr/local/etc/php
if [ ! -f "php.ini" ]; then cp php.ini.example.ini php.ini ; fi

# Prepare a apache conf file.
#  - PHP 8.1 Apache
cd ${CURRENT_DIRECTORY}/../../containers/php81-apache/conf/etc/apache2/sites-available
if [ ! -f "000-default.conf" ]; then cp 000-default.example.conf 000-default.conf ; fi

# Prepare a ".env" from ".env.example" for Laravel Framework.
#  - PHP 8.1 CLI
#  - PHP 8.1 Apache
cd ${CURRENT_DIRECTORY}/../../code
if [ ! -f ".env" ]; then cp .env.example .env ; fi

# Prepare a ".testing.env" from ".env.testing.example" for Laravel Framework.
#  - PHP 8.1 CLI
#  - PHP 8.1 Apache
cd ${CURRENT_DIRECTORY}/../../code
if [ ! -f ".env.testing" ]; then cp .env.testing.example .env.testing ; fi

cd $CURRENT_DIRECTORY