# docker build -t pfinal/php:7.2-supervisor-alpine .
FROM pfinal/php:7.2-fpm-alpine
RUN apk add supervisor
COPY . /www/code/
CMD ["supervisord", "-n", "-c", "/www/code/supervisord.conf"]
