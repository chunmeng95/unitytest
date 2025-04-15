FROM php:7.4-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Copy Apache vhost config
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Install mysqli for CodeIgniter
RUN docker-php-ext-install mysqli

# Set working directory
WORKDIR /var/www/html

# Copy all project files into the container
COPY . /var/www/html
