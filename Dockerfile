FROM php:8.1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get upgrade && apt-get install -y zip unzip libzip-dev
RUN docker-php-ext-install zip
RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY ./php.ini /usr/local/etc/php/conf.d/php.ini
