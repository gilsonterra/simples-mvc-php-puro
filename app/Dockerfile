FROM php:7.2-fpm-stretch

WORKDIR /application
COPY . ./
RUN chown -R www-data:www-data .
RUN docker-php-ext-install mysqli pdo pdo_mysql

