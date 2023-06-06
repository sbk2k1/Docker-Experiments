FROM php:5.6-apache

RUN docker-php-ext-install mysqli

# Copy Apache virtual host configuration
# COPY php56.conf /etc/apache2/sites-available/000-default.conf

# Enable necessary Apache modules
RUN a2enmod rewrite

COPY . /var/www/html/
