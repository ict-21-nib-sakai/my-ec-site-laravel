#!/bin/sh

sh ./set-locale.sh
sh ./install-docker-compose.sh
sh ./prepare-conf-files.sh
sh ./build-cotainer.sh
sh ./swim-docker.sh