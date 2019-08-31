# docker build -t pfinal/php:7.0-workerman-ubuntu . && docker push pfinal/php:7.0-workerman-ubuntu

FROM ubuntu:16.04

LABEL Author="ZouYiliang"
LABEL version="1.0.0"
LABEL description="PHP 7.0 workerman ubuntu"

RUN apt-get update \
&& apt-get install -y php php-dev curl && \
curl http://pecl.php.net/get/event-2.5.3.tgz -o event-2.5.3.tgz && \
tar -zxvf event-2.5.3.tgz &&  cd event-2.5.3 && \
phpize && \
apt -y install libevent-dev && \
phpconfig=`which php-config` && \
ln -s /usr/lib/x86_64-linux-gnu/libssl.so /usr/lib && \
./configure --with-php-config=$phpconfig --with-event-libevent-dir=/usr/local/lib/ && \
make  &&  make install && \
echo extension=event.so >> /etc/php/7.0/cli/php.ini

CMD ["php", "-v"]

