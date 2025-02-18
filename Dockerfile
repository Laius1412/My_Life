# Sử dụng PHP với Apache
FROM php:8.1-apache

# Cài đặt các package cần thiết
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy toàn bộ dự án Laravel vào container
COPY . /var/www/html

# Cấp quyền cho storage và cache
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Chạy Composer install
RUN composer install --no-dev --optimize-autoloader

# Expose port 80
EXPOSE 80

# Khởi động Apache
CMD ["apache2-foreground"]
