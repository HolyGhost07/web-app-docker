FROM php:fpm

RUN apt-get update && \
    apt-get install -y git zlib1g-dev libcurl4-openssl-dev pkg-config libssl-dev && \
    docker-php-ext-install zip && \
    pecl install mongodb  && \
    docker-php-ext-enable mongodb
