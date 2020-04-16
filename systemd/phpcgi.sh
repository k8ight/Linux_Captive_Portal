#!/bin/bash
echo "1" > /proc/sys/net/ipv4/ip_forward
php-cgi -b 127.0.0.1:9000
