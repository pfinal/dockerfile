# docker build -t pfinal/flask:python-3.7-stretch . && docker push pfinal/flask:python-3.7-stretch
FROM python:3.7.3-stretch


LABEL Author="ZouYiliang"

RUN apt-get update \
&& apt-get install -y curl vim-tiny unzip net-tools iputils-ping \
&& pip install uwsgi pillow pymysql flask redis flask-sqlalchemy \
pandas xlrd matplotlib numpy \
-i https://pypi.tuna.tsinghua.edu.cn/simple

EXPOSE 5000

WORKDIR /work

COPY ./myapp.py /work/

# CMD ["python", "run.py"]
CMD ["uwsgi", "--http", ":5000", "--chdir", "/work", "--module", "myapp", "--callable", "app", "--check-static", "/work"]
