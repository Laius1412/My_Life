# Sử dụng hình ảnh PHP chính thức làm base image
FROM php:8.2-fpm

# Cài đặt các gói và extensions cần thiết
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && docker-php-ext-enable opcache \
    && rm -rf /var/lib/apt/lists/*  # Xóa cache APT sau khi cài đặt xong

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục làm việc
WORKDIR /var/www

# Sao chép toàn bộ mã nguồn vào container
COPY . /var/www

# Thiết lập quyền truy cập cho thư mục storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Sao chép file entrypoint script và gán quyền thực thi
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Đặt entrypoint script làm script mặc định khi container khởi động
ENTRYPOINT ["docker-entrypoint.sh"]

# Expose cổng 9000 để phục vụ ứng dụng
EXPOSE 9000

# Chạy PHP-FPM khi container khởi động
CMD ["php-fpm"]
