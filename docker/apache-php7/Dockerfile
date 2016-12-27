FROM ubuntu:xenial

ARG uid

RUN apt-get update && apt-get install --no-install-recommends -y \
git \
apache2 \
composer \
php7.0 \
php7.0-xml \
php7.0-zip \
php7.0-curl \
php7.0-intl \
php7.0-mbstring \
php7.0-mysql \
php7.0-gd \
php7.0-mcrypt \
php7.0-cli \
php-apcu \
libapache2-mod-php7.0 \
&& rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite mpm_prefork php7.0
RUN a2dismod mpm_event
RUN phpenmod mcrypt

RUN adduser apache --uid $uid  --disabled-password

WORKDIR /var/www/html/symfony

COPY envvars /etc/apache2
COPY 000-default.conf /etc/apache2/sites-available

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
