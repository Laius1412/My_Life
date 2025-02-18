#!/bin/sh

# Chạy các lệnh khi container khởi động
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec "$@"
