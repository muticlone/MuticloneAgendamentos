


FROM php:8.1-fpm

# Set your user name
ARG user=muticlone
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nginx \
    nodejs \
    npm

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install redis extension
RUN install - peclo -f redis && \
    docker-php-ext-enable redis

# Configure Nginx
# Fixed typo: /etc/nginx instead of /etc/docs
# Fixed missing directory: /etc/nginx/conf.d
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Set working directory
WORKDIR /var/www

# Copy start script and set permissions
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Copy custom PHP configurations
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Create system user to run Composer and Artisan Commands
# Fixed typo: mkdir && -p /home/$user should be mkdir -p /home/$user
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user \
    && chown -R $user:$user /home/$user
