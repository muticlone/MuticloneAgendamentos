FROM php:8.1-fpm

# Argumentos
ARG username=muticlone
ARG uid=1000

# Atualizar e instalar pacotes
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sudo \
    libhiredis-dev \
    zlib1g-dev

# Limpar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensões do PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Instalar Composer
RUN apt-get install -y composer && \
    mv /usr/bin/composer /usr/local/bin/composer

# Criar usuário do sistema
RUN useradd -G www-data,root -u $uid -d /home/$username $username && \
    mkdir -p /home/$username/.composer && \
    chown -R $username:$username /home/$username

# Instalar e habilitar extensão Redis
RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

# Diretório de trabalho
WORKDIR /var/www

# Copiar configurações personalizadas do PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Definir usuário
USER $username
