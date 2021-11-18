#!/bin/sh

# Set locale.
timedatectl set-timezone Asia/Tokyo
dnf -y install glibc-langpack-ja
localectl set-locale LC_CTYPE=ja_JP.UTF-8