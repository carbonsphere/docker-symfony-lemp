############################################################
# Dockerfile: PHP/5.6.23-fpm
############################################################
FROM php:5.6-fpm

MAINTAINER CarbonSphere <CarbonSphere@gmail.com>

RUN apt-get update \
    && apt-get install -y \
        libmcrypt-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libicu-dev \
    && docker-php-ext-install mcrypt mysql pdo_mysql intl opcache gd mysqli

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
ADD symfony /usr/local/bin/
ADD mysql-test.php /usr/local/bin/
RUN chmod +x /usr/local/bin/symfony

ADD php-timezone.ini /usr/local/etc/php/conf.d
ADD symfony-pool.conf /usr/local/etc/php-fpm.d/

# Remove default config file
RUN mv /usr/local/etc/php-fpm.d/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf.bak && \
    mv /usr/local/etc/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf.bak && \
    mv /usr/local/etc/php-fpm.d/docker.conf /usr/local/etc/php-fpm.d/docker.conf.bak



CMD ["symfony"]
