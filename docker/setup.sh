#!/bin/bash
cp docker/dev/.env.dev .env
echo "DEV_USER_ID="$(id -u) >> .env
echo "DEV_GROUP_ID="$(id -g) >> .env
docker compose up -d --build --remove-orphans --quiet-pull 
make npm-install
# docker compose run node npx 