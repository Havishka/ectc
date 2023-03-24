FROM php:8.0-apache
WORKDIR /var/www/html/ectc

COPY ./ /var/www/html/ectc/
RUN apt-get update -y && apt-get install -y default-libmysqlclient-dev
RUN apt-get update && apt-get install -y nano
RUN apt-get update && apt-get install -y sudo
RUN docker-php-ext-install mysqli