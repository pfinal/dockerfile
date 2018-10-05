# docker build -t 190196539/php:7.0-fpm .

FROM php:7.0-fpm
# Install modules
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libxml2-dev \
    && docker-php-ext-install iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install zip \
    && docker-php-ext-install sockets \
    && docker-php-ext-install gettext \
    && docker-php-ext-install exif \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install tokenizer \
    && docker-php-ext-install dom \
    && docker-php-ext-install ctype \
    && docker-php-ext-install json \
    && docker-php-ext-install opcache \
    && docker-php-ext-install posix \
    && docker-php-ext-install xml

# 基础镜像已包含: curl mbstring openssl

# apt install -y libxml2-dev 才能安装  docker-php-ext-install xml 否则xml2-config not found. Use --with-libxml-dir=<DIR>

# bcmath bz2 calendar ctype curl dba dom enchant exif fileinfo filter ftp gd gettext gmp hash iconv imap interbase intl json ldap mbstring mcrypt mysqli oci8 odbc opcache pcntl pdo pdo_dblib pdo_firebird pdo_mysql pdo_oci pdo_odbc pdo_pgsql pdo_sqlite pgsql phar posix pspell readline recode reflection session shmop simplexml snmp soap sockets spl standard sysvmsg sysvsem sysvshm tidy tokenizer wddx xml xmlreader xmlrpc xmlwriter xsl zip

RUN echo "date.timezone = Asia/Chongqing" > /usr/local/etc/php/php.ini

EXPOSE 9000