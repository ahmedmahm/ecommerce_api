FROM devilbox/php-fpm-7.4:latest

# Install Redis && MCrypt install encryption
RUN pecl install redis-5.1.1

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git


RUN apt-get install -y \
        libzip-dev \
        zlib1g-dev \
    && docker-php-ext-install zip

RUN apt-get -y install curl gnupg
RUN curl -sL https://deb.nodesource.com/setup_11.x  | bash -
RUN apt-get -y install nodejs
RUN npm install

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN curl --silent --show-error https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/laravel
