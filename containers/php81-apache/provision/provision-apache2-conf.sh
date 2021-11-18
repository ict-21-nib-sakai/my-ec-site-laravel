#!/bin/bash

if [ -f "/tmp/conf/etc/apache2/sites-available/000-default.conf" ]; then
  cp -f /tmp/conf/etc/apache2/sites-available/000-default.conf         /etc/apache2/sites-available/000-default.conf
else
  cp -f /tmp/conf/etc/apache2/sites-available/000-default.example.conf /etc/apache2/sites-available/000-default.conf
fi

chmod 644 /etc/apache2/sites-available/000-default.conf