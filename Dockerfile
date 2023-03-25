FROM php:7.4.3-apache
RUN apt-get update && apt-get install -y \
    curl \
    nano \
    sudo \
    default-libmysqlclient-dev

RUN docker-php-ext-install mysqli

COPY ./ /var/www/html/ectc/

WORKDIR /var/www/html/ectc

EXPOSE 80

CMD ["apache2-foreground"]





