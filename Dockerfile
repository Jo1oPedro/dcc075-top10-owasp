ARG PHP_VERSION
FROM php:${PHP_VERSION} as app

## Diretório da aplicação
ARG APP_DIR=/var/www/app

## Versão da Lib do Redis para PHP
ARG REDIS_LIB_VERSION=5.3.7

# dependências recomendadas de desenvolvido para ambiente linux
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
        libzip-dev \
        unzip \
        libpng-dev \
        libpq-dev \
        libxml2-dev

RUN docker-php-ext-install pdo pdo_mysql zip session sockets

RUN pecl install redis-${REDIS_LIB_VERSION} \
    && docker-php-ext-enable redis

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR $APP_DIR
RUN cd $APP_DIR
RUN chown www-data:www-data $APP_DIR
COPY --chown=www-data:www-data . .

RUN composer install --no-interaction

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public", "public/index.php"]