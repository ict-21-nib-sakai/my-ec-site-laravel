#!/bin/sh

APP_PREFIX="app"
CURRENT_DIRECTORY=`pwd`

cd ${CURRENT_DIRECTORY}/../../containers
docker exec --user root ${APP_PREFIX}-php81_apache-1 index.sh
docker exec --user root ${APP_PREFIX}-php81_cli-1 index.sh
docker-compose restart

cd $CURRENT_DIRECTORY