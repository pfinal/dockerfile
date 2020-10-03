# docker build -t pfinal/ubuntu1804-gcc .
FROM ubuntu:18.04

RUN sed -i s@/archive.ubuntu.com/@/mirrors.aliyun.com/@g /etc/apt/sources.list \
&& apt-get clean \
&& apt-get update \
&& apt install -y gcc gdb vim autoconf libxml2 libxml2-dev

# 编译PHP需要libxml2、libxml2-dev
# 编译PHP扩展需要autoconf
