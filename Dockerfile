# Gunakan PHP 8.2 image
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git unzip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

# Set working directory
WORKDIR /var/www

# Salin file composer.json dan composer.lock, lalu install dependensi
COPY composer.json composer.lock /var/www/
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --no-dev --optimize-autoloader --prefer-dist

# Salin seluruh file aplikasi Laravel
COPY . /var/www

# Set proper permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 80
EXPOSE 80

# Jalankan aplikasi dengan php artisan serve
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
