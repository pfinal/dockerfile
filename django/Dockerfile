# docker build -t 190196539/django:1.1 .
FROM python:3.6

RUN pip install uwsgi pillow pymysql django==1.11 -i https://pypi.tuna.tsinghua.edu.cn/simple

WORKDIR /work
COPY . /work
EXPOSE 8000
#CMD ["python", "manage.py", "runserver", "0.0.0.0:8000"]
CMD ["uwsgi", "--http", ":8000", "--chdir", "/work", "--module", "demo.wsgi", "--check-static", "/work"]
