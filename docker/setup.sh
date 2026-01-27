#!/bin/bash
if [ ! -f ".env" ]; then     
    echo ✏️ initiating .env
    cp docker/dev/.env.dev .env
    echo "DEV_USER_ID="$(id -u) >> .env
    echo "DEV_GROUP_ID="$(id -g) >> .env
else 
    echo ⚠️ .env already exists. Skipping
fi
source .env
docker compose build 
docker compose up -d --remove-orphans --quiet-pull
#docker compose exec -T php composer install
#docker compose exec -T php php artisan key:generate
docker compose exec -T php php artisan migrate --force
#docker compose exec -T php npm cache clean --force
#docker compose exec -T php npm install 
#docker compose exec -d php npm run dev
#docker compose exec -d php php artisan serve --host=0.0.0.0 --port=8000
echo "🚀 app available at ${APP_URL}"

# docker compose run node npx 