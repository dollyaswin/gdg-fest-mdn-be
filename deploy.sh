#!/bin/bash

echo "Build..."
cd src
rm -fr vendor
composer install

echo "Deploy..."
rsync --exclude '.git' --exclude '.env' --exclude 'storage' -av --delete . $APP_PATH/.

cd $APP_PATH/

# clear cache
php artisan cache:clear

# run database migration
#php artisan migrate --force

echo "Reload PHP & Nginx"
sudo systemctl reload php8.1-fpm
sudo systemctl reload nginx
