#!/bin/bash

cp .env.example .env
composer install
php artisan key:generate

# Start php-fpm in the background
php-fpm
  
