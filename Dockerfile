FROM php:8.2-fpm

# Install necessary extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy project files to container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Expose PHP-FPM port
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
