#!/bin/bash

#echo "Read Configuration..."
#while read line; do export $line; done < .env

echo "Build..."
# rm -fr vendor
# composer install

echo "Deploy..."
rsync --exclude ".git" -av --delete . $APP_PATH/.

echo "Reload PHP & Nginx"
sudo systemctl reload php8.1-fpm
sudo systemctl reload nginx
