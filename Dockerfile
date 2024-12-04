FROM php:8.3-apache
RUN apt update \
  && apt install -y libonig-dev \
  && docker-php-ext-install pdo_mysql mysqli mbstring