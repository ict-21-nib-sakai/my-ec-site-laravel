#!/bin/bash

cd `dirname $0`

provision-php-ini.sh
provision-apache2-conf.sh

echo 'Configuration files have been placed. Restart the container. (eg) "docker restart CONTAINER_NAME".'