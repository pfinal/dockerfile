# docker build -t pfinal/eros .
# docker push pfinal/eros
FROM node:8

RUN npm install -g cnpm --registry=https://registry.npm.taobao.org \
&& cnpm i eros-cli -g

WORKDIR /data

