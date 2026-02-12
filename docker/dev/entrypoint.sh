#!/bin/sh
set -e

composer install
php artisan key:generate
#php artisan migrate --force
npm cache clean --force
npm install 
npm run dev &
php artisan serve --host=0.0.0.0 --port=8000
