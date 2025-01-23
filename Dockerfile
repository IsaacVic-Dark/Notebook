# Use the official PHP image with extensions
FROM php:8.4.3

# Copy application code
COPY . /app

# Set the working directory
WORKDIR /app

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git \
    && docker-php-ext-install zip pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Set permissions for Laravel
RUN composer install

# Expose port 9000 for PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
