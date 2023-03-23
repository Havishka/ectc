FROM php:7.4-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN apt-get update && apt-get install -y \
    mysql-client \
    phpmyadmin

COPY ./ectc /var/www/html/ectc

CMD ["apache2-foreground"]
