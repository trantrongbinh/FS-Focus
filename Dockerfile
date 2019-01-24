FROM ubuntu:16.04

MAINTAINER BKFA <bkfa.com@gmail.com>

# clean up
RUN apt clean && apt-get update && apt-get upgrade -y

# php required settings
RUN apt install -y locales
RUN locale-gen en_US.UTF-8
ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8

# nginx 1.12
ADD ./.docker/web/server.conf /etc/nginx/conf.d/default.conf

# random
RUN apt install  -y \
    curl zip unzip git software-properties-common

# install PHP
RUN add-apt-repository ppa:ondrej/php -y
RUN apt update
RUN apt install -y php7.2 php7.2-cli php7.2-common php7.2-mbstring php7.2-xml php7.2-mysqlnd php7.2-pdo-sqlite

# PHP composer
RUN curl -sS https://getcomposer.org/installer | php --  --install-dir=/usr/bin --filename=composer

# nodejs latest
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash -
RUN apt install -y nodejs

# zip extension
RUN apt install php7.2-dev -y
RUN apt install php-pear -y
##RUN pecl install xdebug

WORKDIR /var/www/fs_focus/
