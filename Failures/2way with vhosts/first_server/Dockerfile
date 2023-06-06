FROM php:7-apache

RUN docker-php-ext-install pdo pdo_mysql

# Copy Apache virtual host configuration
# COPY php7.conf /etc/apache2/sites-available/000-default.conf

# Enable necessary Apache modules
RUN a2enmod rewrite

COPY . /var/www/html/
