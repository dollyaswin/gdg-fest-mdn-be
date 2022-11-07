#!/bin/bash

BE_PATH=/var/www/gdg/api/current

echo "Build..."
# rm -fr vendor
# composer install

echo "Deploy..."
rsync --exclude ".git" -av . $BE_PATH/.

sudo systemctl reload php8.1-fpm
sudo systemctl reload nginx
