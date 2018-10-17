# docker build -t pfinal/php:7.2-fpm-alpine . && docker push pfinal/php:7.2-fpm-alpine

FROM alpine:3.8

LABEL Author="ZouYiliang"
LABEL version="1.0.0"
LABEL description="PHP 7.2 FPM"

RUN apk update && apk add "php7<7.3" \
    php7-memcached \
    php7-gd \
    php7-zip \
    php7-dom \
    php7-json \
    php7-mcrypt \
    php7-openssl \
    php7-bcmath \
    php7-iconv \
    php7-curl \
    php7-pdo \
    php7-pdo_mysql \
    php7-mbstring \
    php7-gettext \
    php7-xmlreader \
    php7-xmlrpc \
    php7-zlib \
    php7-bz2 \
    php7-tokenizer \
    php7-ctype \
    php7-intl \
    php7-gmp \
    php7-mysqli \
    php7-fpm \
&& rm -rf /var/cache/apk/* \
&& ln -s /usr/sbin/php-fpm7 /usr/sbin/php-fpm \
&& set -ex && cd /etc/php7 \
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
} | tee php-fpm.d/docker.conf \
&& { \
        echo '[global]'; \
        echo 'daemonize = no'; \
        echo; \
        echo '[www]'; \
        echo '; default 127.0.0.1 only' \
        echo; \
        echo 'listen = 9000'; \
    } | tee php-fpm.d/zz-docker.conf

EXPOSE 9000

# CMD ["php-fpm", "--nodaemonize"]
CMD ["php-fpm"]


