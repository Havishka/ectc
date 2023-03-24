FROM php:8.0-apache
WORKDIR /var/www/html/ectc

COPY ./ /var/www/html/ectc/
RUN apt-get update -y && apt-get install -y libmariad-dev
RUN docker-php-ext-install mysqli