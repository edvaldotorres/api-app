FROM phpdockerio/php:8.0-fpm
WORKDIR "/app"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
    php8.0-http \ 
    php8.0-pgsql \ 
    php8.0-psr \ 
    php8.0-xdebug; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
