#! /bin/bash

fname="${1##*/}"

wget -b --no-check-certificate -N $1 -P /home/samba/Downloads/ -o /tmp/${fname}.log
#wget -b --no-check-certificate -N $1 -P /var/cache/ -o /tmp/${fname}.log

