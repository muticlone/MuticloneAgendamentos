#!/bin/bash

# Execute os comandos ao iniciar o contêiner
composer install
php artisan key:generate

# Iniciar o PHP-FPM
php-fpm --allow-to-run-as-root
