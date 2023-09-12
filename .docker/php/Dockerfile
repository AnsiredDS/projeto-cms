FROM php:8.1-apache

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        ssl-cert \
        supervisor \
        libssl-dev \
        libcurl4-openssl-dev \
        libjpeg-dev \
        libpng-dev \
        libzip-dev \
        libmcrypt-dev \
        libreadline-dev \
        libxml2-dev \
        libmagickwand-dev \
        imagemagick \
        libxslt1-dev \
        libssl-dev \
        libpq-dev \
        zip \
        unzip \
        graphviz \
    && docker-php-ext-install \
        gd \
        zip \
        soap \
        pdo_mysql \
        pdo_pgsql \
        mysqli \
        xsl \
        opcache \
        calendar \
        intl \
        exif \
        bcmath \
        opcache \
    && pecl install redis \
    && pecl install imagick \
    && pecl install mcrypt \
    && docker-php-ext-enable redis imagick mcrypt \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite negotiation

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

RUN composer --version && php -v
