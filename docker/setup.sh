#!/bin/bash
cp docker/dev/.env.dev .env
docker compose up -d --build --remove-orphans
echo "DEV_USER="$(id -u) >> .env
echo "DEV_GROUP="$(id -g) >> .env
make npm-install
# docker compose run node npx 