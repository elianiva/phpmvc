FROM php:8.0-apache-buster

WORKDIR /var/www/html

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

ADD . .

EXPOSE 80
