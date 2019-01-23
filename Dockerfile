FROM ubuntu:16.04

MAINTAINER BKFA <bkfa.com@gmail.com>

RUN apt-get update && apt-get install -y --no-install-recommends apt-utils wget zip unzip

# php:7.2-fpm
RUN apt-get update && apt-get install -y libmcrypt-dev \
mysql-client libmagickwand-dev --no-install-recommends \
&& pecl install imagick \
&& docker-php-ext-enable imagick \
&& docker-php-ext-install mcrypt pdo_mysql

# nginx 1.12
ADD server.conf /etc/nginx/conf.d/default.conf

RUN export LANG=en_US.UTF-8

ENV LANGUAGE=en_US.UTF-8
ENV LC_ALL=en_US.UTF-8
ENV LC_CTYPE=UTF-8
ENV LANG=en_US.UTF-8

# Add the "PHP 7" ppa - kho lưu trữ của bên thứ ba để cài đặt phiên bản PHP mới nhất
RUN add-apt-repository -y \
    ppa:ondrej/php

# PHP 7.2 & nginx 1.12 package dependency installation
RUN apt-get update && apt-get install php7.2 nginx1.12
# command will install additional packages: ibapache2-mod-php7.2, libargon2-0, libsodium23, libssl1.1, php7.2-cli, php7.2-common, php7.2-json, php7.2-opcache, php7.2-readline

# Install PHP 7.2 modules, some PHP extentions and some useful Tools with APT
RUN apt-get update && apt-get install -y --force-yes \
        php-pear \
        php7.2-curl \
        php7.2-xml \
        php7.2-mbstring \
        php7.2-mcrypt \
        php7.2-mysql \
        php7.2-zip \
        php7.2-memcached \
        php7.2-gd \
        php7.2-fpm \
        php7.2-xdebug \
        php7.2-bcmath \
        php7.2-intl \
        php7.2-dev \
        libcurl4-openssl-dev \
        libedit-dev \
        libssl-dev \
        libxml2-dev \
        xz-utils \
        git \
        curl \
        vim \
        nano \
        net-tools \
        pkg-config \
        iputils-ping

# Add bin folder of composer to PATH.
RUN echo "export PATH=${PATH}:/var/www/fs_focus/vendor/bin:/root/.composer/vendor/bin" >> ~/.bashrc

# Install Nodejs
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g gulp-cli bower eslint babel-eslint eslint-plugin-react yarn

# cài composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php 
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
# cài nodejs 
RUN curl -sL https://deb.nodesource.com/setup_7.x | bash -
RUN apt-get install -y nodejs

# Clean up
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN chmod -R 777 public storage

WORKDIR /var/www/fs_focus

EXPOSE 80

ENTRYPOINT /entrypoint.sh

