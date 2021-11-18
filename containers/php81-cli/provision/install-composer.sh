#!/bin/sh

if [ -f "/usr/local/bin/composer" ]; then
    exit
fi

EXPECTED_CHECKSUM="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]; then
    echo >&2 'ERROR: Invalid installer checksum'
    rm composer-setup.php
    exit 1
fi

php composer-setup.php --quiet
RESULT=$?
rm composer-setup.php

if [ -f "composer.phar" ]; then
    mv composer.phar /usr/local/bin/composer
    chmod 755 /usr/local/bin/composer
fi

exit $RESULT