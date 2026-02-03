#!/bin/sh
set -e

echo "✏️️ Generating .svg's from .puml's"
make puml-generate

echo "🧼 Running prettier"
docker compose exec -T php npx pretty-quick --staged
echo "👀 running eslint"
docker compose exec -T php npx eslint .
echo "👀 running laravel pint"
docker compose exec -T php ./vendor/bin/pint --no-interaction
