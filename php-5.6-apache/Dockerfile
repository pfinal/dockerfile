# docker build -t pfinal/php-5.6-apache .
# docker push pfinal/php-5.6-apache
FROM php:5.6-apache

RUN apt-get update && \
apt-get install -y --no-install-recommends libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
rm -r /var/lib/apt/lists/* && \
docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
docker-php-ext-install -j$(nproc) gd mbstring mysqli pdo pdo_mysql shmop


