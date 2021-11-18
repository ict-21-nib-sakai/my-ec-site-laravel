#!/bin/sh

cd /var/www/code || exit
composer config -g repos.packagist composer https://packagist.jp
composer install
composer config -g --unset repos.packagist