FROM php:7.1-fpm

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/bin/composer && \
    apt-get update && \
    apt-get install -y git zlib1g-dev && \
    docker-php-ext-install zip

COPY php/composer.json /data/projects/project/

RUN cd /data/projects/project && \
    composer install --ignore-platform-reqs --no-plugins --no-scripts

FROM php:7.1-fpm

COPY  code/. /data/projects/project/.
COPY --from=0 /data/projects/project/. /data/projects/project/.
