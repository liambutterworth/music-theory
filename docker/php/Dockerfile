FROM php:8.0-fpm

RUN apt-get update && \
    apt-get -y --no-install-recommends install git npm

RUN npm install npm@latest -g

RUN php -r "readfile('http://getcomposer.org/installer');" | \
    php -- --install-dir=/usr/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www
