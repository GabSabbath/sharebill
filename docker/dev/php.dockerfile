FROM composer:2 AS composer

FROM php:8.5-fpm-alpine
COPY --from=composer /usr/bin/composer /usr/local/bin/composer

WORKDIR /usr/src/app

RUN apk add --no-cache \
    bash \
    git \
    nodejs \
    npm

COPY docker/dev/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]
