FROM php:8.2-fpm

# Install dependencies dan ekstensi PHP yang diperlukan
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip curl git libonig-dev libxml2-dev libpng-dev libjpeg-dev libfreetype6-dev libpq-dev libssl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip mbstring gd xml opcache

# Install composer global (copy dari official composer image)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy seluruh source code ke container
COPY . .

# Set permission folder storage dan bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]