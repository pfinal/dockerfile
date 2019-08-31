# docker build -t pfinal/python:3.7 .

FROM python:3.7.2-stretch

COPY ./run.sh /

EXPOSE 8000

WORKDIR /work

CMD ["/run.sh"]

