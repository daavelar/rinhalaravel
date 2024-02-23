FROM php:8.2-cli-alpine

RUN apk --no-cache add \
    $PHPIZE_DEPS \
    openssl-dev \
    mysql-client \
    && docker-php-ext-install pdo_mysql pcntl \
    && pecl install openswoole \
    && docker-php-ext-enable openswoole pcntl \
    && pecl install redis \
    && docker-php-ext-enable redis

WORKDIR /app

COPY . /app

EXPOSE 8000

CMD ["php", "artisan", "octane:start", "--port=8000", "--host=0.0.0.0"]
