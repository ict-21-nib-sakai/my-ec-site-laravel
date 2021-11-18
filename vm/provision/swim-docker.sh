#!/bin/sh

APP_PREFIX="my_app"
CURRENT_DIRECTORY=`pwd`

cd ${CURRENT_DIRECTORY}/../../containers
docker exec ${APP_PREFIX}-php81_apache-1 index.sh
docker exec ${APP_PREFIX}-php81_cli-1 index.sh
docker-compose restart

cd $CURRENT_DIRECTORY