FROM php:7.2.4-fpm-alpine3.7

RUN apk add --no-cache $PHPIZE_DEPS zlib-dev git

RUN docker-php-ext-install zip && \
    pecl install mongodb  && \
    docker-php-ext-enable mongodb

RUN curl -ksS https://getcomposer.org/installer | php -- --install-dir=/usr/bin && \
    ln -s /usr/bin/composer.phar /usr/bin/composer
