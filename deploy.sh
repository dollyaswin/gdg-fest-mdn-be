#!/bin/bash

BE_PATH=/var/www/gdg/api/current

echo "Build..."
git pull origin ${ENV_BRANCH}
# rm -fr vendor
# composer install

echo "Deploy..."
rsync --exclude ".git" -av . $BE_PATH/.

echo "Reload PHP & Nginx"
sudo systemctl reload php8.1-fpm
sudo systemctl reload nginx
