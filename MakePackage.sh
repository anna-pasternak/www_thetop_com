#!/bin/bash

tar -zcvf /home/anna/Desktop/Packages/$1.tar.gz --exclude='/var/www/html/RabbitMQ.ini' --exclude='/var/www/html/RabbitMQ.ini~' --exclude='/var/www/html/log.txt' --exclude='/var/www/html/log.txt~' /var/www/html/*
