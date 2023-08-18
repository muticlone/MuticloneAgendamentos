FROM php:8.1-apache

# Install necessary libraries
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    mysql-server \
    php-mysql

# Install PHP extensions
RUN docker-php-ext-install \
    mbstring \
    zip \
    pdo_mysql

# Copy Laravel application
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install

# Change ownership of our applications
RUN chown -R www-data:www-data /var/www/html

# Configure MySQL
COPY mysql.cnf /etc/mysql/mysql.conf.d/mysqld.cnf

# Start MySQL server
RUN service mysql start

# Create database for Laravel application
RUN mysql -u root -e "CREATE DATABASE laravel;"

# Update .env file with MySQL configuration
COPY .env.example .env
RUN sed -i 's/DB_HOST=127.0.0.1/DB_HOST=mysql/g' .env
RUN sed -i 's/DB_DATABASE=laravel/DB_DATABASE=laravel/g' .env
RUN sed -i 's/DB_USERNAME=root/DB_USERNAME=root/g' .env
RUN sed -i 's/DB_PASSWORD=/DB_PASSWORD=root/g' .env

# Generate Laravel application key
RUN php artisan key:generate

# Expose port 80
EXPOSE 80


# Adjust Apache configurations
RUN a2enmod rewrite
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf
