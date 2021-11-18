#!/bin/sh

CURRENT_DIRECTORY=`pwd`

# Build containers.
cd ${CURRENT_DIRECTORY}/../../containers
docker-compose up -d

cd $CURRENT_DIRECTORY