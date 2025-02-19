# Sử dụng hình ảnh PHP chính thức làm base image
FROM php:8.2-fpm

# Cài đặt các gói và extensions cần thiết
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \ 
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath


# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục làm việc
WORKDIR /var/www

# Sao chép toàn bộ mã nguồn vào container
COPY . /var/www

# Thiết lập quyền truy cập cho thư mục storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Sao chép file entrypoint script và gán quyền thực thi
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Đặt entrypoint script làm script mặc định khi container khởi động
ENTRYPOINT ["docker-entrypoint.sh"]

# Expose cổng 9000 để phục vụ ứng dụng
EXPOSE 9000

# Chạy PHP-FPM khi container khởi động
CMD ["php-fpm"]
