#!/bin/bash

# Continuous Integration
echo "Build..."
cd src
rm -fr vendor
composer install

echo "Testing..."
vendor/bin/phpunit

# Continuous Deployment
echo "Deploy..."
rsync --exclude '.git' --exclude 'storage' -a --delete . $APP_PATH/.

cd $APP_PATH/

echo "Clear Cache..."
php artisan cache:clear

echo "Database Migration..."
php artisan migrate --force

echo "Reload FPM & Nginx"
sudo systemctl reload php8.1-fpm
sudo systemctl reload nginx
