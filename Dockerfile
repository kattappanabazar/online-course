FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install MySQLi extension for PHP
RUN docker-php-ext-install mysqli

# Copy site into Apache root
COPY . /var/www/html/

# Set file permissions
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
