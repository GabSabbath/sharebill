#!/bin/sh
echo "✏️️ Generating .svg's from .puml's"
make puml-generate

echo "🧼 Running prettier"
npx pretty-quick --staged
echo "👀 running eslint"
# TODO


