
FROM php:8.1pm

#
-fARG username=muticlone
ARG uid=1000

# Update and install packages
RUN apt-get update && apt-get install -y \
 git \
    curl \
    lib-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sudo \
    libhiredis-dev \
    zlib1g-dev

# Clear the package cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl gd

# Install Composer
# Fixing a typo: corrected the typo '/binfilename' to '--filename'
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local --filename=composer

# Create system user
# Fixing a typo: corrected the typo '$composerusername' to '$username'
RUN useradd -G www-data,root -u $uid -d /home/$username $username && \
    mkdir -p /home/$username/. && \
    chown -R $username:$username /var/www

# Install and enable Redis extension
RUN pecl install -o -f redis && \
    rm -rf /tmp/* && \
    docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

# Copy custom PHP configuration
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Set the user
USER $username
