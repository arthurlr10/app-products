FROM composer:2 AS vendor
WORKDIR /app
COPY php/www/composer.* ./
RUN composer install --no-dev --prefer-dist --optimize-autoloader

FROM php:8.3-fpm-alpine
RUN apk add --no-cache icu-data-full \
    && docker-php-ext-install intl pdo_mysql opcache \
    && rm -rf /var/cache/apk/*

WORKDIR /var/www/html
COPY --from=vendor /app/vendor ./vendor
COPY php/www/ .

COPY docker/php/php.ini /usr/local/etc/php/conf.d/app.ini

EXPOSE 9000
CMD ["php-fpm", "-F"]