FROM php:8.2-fpm-bullseye

COPY .docker/develop/php/php.ini /usr/local/etc/php/php.ini

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN install-php-extensions \
    pdo_mysql \
    bcmath \
    mbstring \
    zip \
    opcache \
    gd \
    intl \
    redis \
    decimal \
    xdebug


RUN curl -sL https://deb.nodesource.com/setup_lts.x | bash -
RUN apt install -y nodejs
RUN npm install --global yarn

COPY . /app

RUN ls -a /app

WORKDIR /app

COPY .docker/develop/php/env /app/.env

RUN chmod -R a+w /app/storage /app/bootstrap/cache

EXPOSE 9000

CMD "php-fpm"