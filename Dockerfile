# Use the official PHP image with the required extensions
FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Set working directory inside the container
WORKDIR /var/www

# Copy the Laravel project files into the container
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer install

# Expose port 8000 for Laravel's built-in server
EXPOSE 8000

# Command to run Laravel's built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]

