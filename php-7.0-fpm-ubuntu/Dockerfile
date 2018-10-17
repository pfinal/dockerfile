# docker build -t pfinal/php:7.0-fpm-ubuntu . && docker push pfinal/php:7.0-fpm-ubuntu

FROM ubuntu:16.04

LABEL Author="ZouYiliang"
LABEL version="1.0.0"
LABEL description="PHP 7.2 FPM"


RUN apt-get update \
&& apt-get install -y curl vim-tiny unzip net-tools \
  php7.0 \
  php7.0-mysql \
  php7.0-curl \
  php7.0-gd \
  php7.0-mcrypt \
  php-memcache \
  php7.0-mbstring \
  php7.0-zip \
  php-xml \
&& set -ex && cd /etc/php/7.0/fpm/ \
&& echo "date.timezone = Asia/Chongqing" > conf.d/timezone.ini \
&& { \
    echo '[global]'; \
    echo 'error_log = /proc/self/fd/2'; \
    echo; \
    echo '[www]'; \
    echo '; if we send this to /proc/self/fd/1, it never appears'; \
    echo 'access.log = /proc/self/fd/2'; \
    echo; \
    echo 'clear_env = no'; \
    echo; \
    echo '; Ensure worker stdout and stderr are sent to the main error log.'; \
    echo 'catch_workers_output = yes'; \
} | tee pool.d/docker.conf \
&& { \
        echo '[global]'; \
        echo 'daemonize = no'; \
        echo; \
        echo '[www]'; \
        echo; \
        echo 'listen = 9000'; \
    } | tee pool.d/zz-docker.conf \
&& ln -s /usr/sbin/php-fpm7.0 /usr/local/sbin/php-fpm \
&& mkdir -p /run/php


EXPOSE 9000

# CMD ["php-fpm", "--nodaemonize"]
CMD ["php-fpm"]

