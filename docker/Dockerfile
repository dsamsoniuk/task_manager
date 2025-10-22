FROM php:8.2-fpm


USER root

RUN groupadd -g 1000 elka_user && \
    useradd -u 1000 -g elka_user -m -s /bin/bash elka_user
# -m - create home dir for user
WORKDIR /app

COPY . .

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN apt-get update
RUN apt-get -y upgrade

RUN apt-get install -y libicu-dev
RUN apt-get install -y ffmpeg
RUN apt-get install -y npm

RUN install-php-extensions @composer-2.6.6
RUN install-php-extensions \
    xdebug-3.2.2 \
    zip \
    pdo_mysql
     
RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl
    

RUN git config --global --add safe.directory /app

USER elka_user