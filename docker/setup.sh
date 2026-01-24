#!/bin/bash
cp docker/dev/.env.dev .env
docker compose up -d --build --remove-orphans
echo "DEV_USER_ID="$(id -u) >> .env
echo "DEV_GROUP_ID="$(id -g) >> .env
make npm-install
# docker compose run node npx 