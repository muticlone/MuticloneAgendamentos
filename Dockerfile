
FROM php:8.1-fpm

# set your user name, ex: user=bernardo
# Changed ARG user to ARG username to match the ARG value inside the Dockerfile
ARG username=muticloneARG
 uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Get latest Composer
# Remove --from=composer:latest and append "sudo" before "cp" as COPY command requires root privileges
RUN apt-get install -y composer && \
    sudo cp /usr/bin/composer /usr/local/bin/composer  # Changed the destination path of the composer

# Create system user to run Composer and Artisan Commands
# Change the username and home directory permissions to match the ARG values
RUN useradd -G www-data,root -u $uid -d /home/$username $username && \
    mkdir -p /home/$username/.composer && \
    chown -R $username:$username /home/$username

# Install redis
# Added libhiredis-dev and zlib1g-dev before pecl install command as dependencies
RUN apt-get install -y libhiredis-dev zlib1g-dev && \
    pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

# Copy custom configurations PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

USER $username
