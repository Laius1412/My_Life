#!/bin/sh
set -e

# Chờ database sẵn sàng trước khi chạy migrations
echo "Waiting for database connection..."
until php artisan migrate --force; do
  echo "Database is not ready yet. Retrying in 5 seconds..."
  sleep 5
done

# Gán quyền chính xác cho Laravel storage và cache
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Tạo cache Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Application is ready!"

# Chạy lệnh mặc định (php-fpm)
/usr/local/sbin/php-fpm -F
