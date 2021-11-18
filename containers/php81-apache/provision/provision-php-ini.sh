#!/bin/bash

if [ -f "/tmp/conf/usr/local/etc/php/php.ini" ]; then
  cp -f /tmp/conf/usr/local/etc/php/php.ini             /usr/local/etc/php/php.ini 
else
  cp -f /tmp/conf/usr/local/etc/php/php.ini.example.ini /usr/local/etc/php/php.ini
fi

chmod 644 /usr/local/etc/php/php.ini
