# docker build -t pfinal/flask . && docker push pfinal/flask
FROM python:3.6

RUN pip install uwsgi pillow pymysql flask redis flask-sqlalchemy -i https://pypi.tuna.tsinghua.edu.cn/simple

EXPOSE 5000

WORKDIR /work

COPY ./myapp.py /work/

# CMD ["python", "run.py"]
CMD ["uwsgi", "--http", ":5000", "--chdir", "/work", "--module", "myapp", "--callable", "app", "--check-static", "/work"]
