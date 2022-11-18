#!/bin/bash

echo "Build..."
cd src
rm -fr vendor
composer install

echo "Deploy..."
rsync --exclude '.git' --exclude 'storage' -av --delete . $APP_PATH/.

cd $APP_PATH/

# cache
echo "Clear Config/Cache..."
php artisan config:clear
php artisan cache:clear

echo "Cache Config..."
php artisan config:cache

# run database migration
echo "Database Migration..."
php artisan migrate --force

echo "Reload PHP & Nginx"
sudo systemctl reload php8.1-fpm
sudo systemctl reload nginx
