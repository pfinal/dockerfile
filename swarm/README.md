
## 构建Nginx镜像

```
cd nginx
docker build -t mynginx:1.0 .
cd ..
```


## 构建PHP镜像

```
cd php
docker build -t myphp:1.0 .
cd ..
```


## 将镜像push到私有仓库

```
# 请替换 172.19.80.62:5000 为你实际的私有仓库地址
docker login 172.19.80.62:5000

docker tag myphp:1.0 172.19.80.62:5000/myphp:1.0
docker push 172.19.80.62:5000/myphp

docker tag mynginx:1.0 172.19.80.62:5000/mynginx:1.0
docker push 172.19.80.62:5000/mynginx

# 修改 compose.yml中的私有仓库地址为你真实的地址
```

## 所有的节点都需要配置私有仓库地址，否则login不成功，无法下载镜像

```
vi /etc/docker/daemon.json 
{ "insecure-registries":["172.19.80.62:5000"] }

service docker restart
```


## 部署服务 (服务名叫demo)

```
docker stack deploy -c compose.yml --with-registry-auth demo
docker service ls
docker service ps demo_nginx
docker service ps demo_php
docker service logs demo_mysql
```

浏览器访问8080端口

```
http://IP:8080/

服务器: mysql
用户名: root
密码:  abc123

demo数据库已自动创建，在里面建一张表，插入测试数据

CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50) NOT NULL
);

INSERT INTO `user` VALUES (1, 'summer');

```

浏览器访问8081端口

```
MySQL Connect Success. Version: 8.0.12
array(2) { ["id"]=> int(1) ["name"]=> string(6) "summer" }
```

删除demo

```
docker stack rm demo
docker rmi myphp
docker rmi mynginx
```
