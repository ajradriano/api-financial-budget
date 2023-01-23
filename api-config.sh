#!/bin/bash

mkdir -p storage/framework/cache/data

mkdir -p storage/framework/sessions

mkdir -p storage/framework/views

chmod -R 0777 storage/

touch storage/framework/cache/datatest.txt

composer install

cp .env.example .env

php artisan key:generate

php artisan config:cache

php artisan cache:clear
