FROM php:7.2.4-fpm-alpine3.7

RUN apk add --no-cache $PHPIZE_DEPS zlib-dev git

RUN docker-php-ext-install zip && \
    pecl install mongodb  && \
    docker-php-ext-enable mongodb
