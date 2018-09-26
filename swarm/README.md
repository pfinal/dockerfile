
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

## 部署服务 (服务名叫demo)

```
docker stack deploy -c compose.yml --with-registry-auth demo
docker service ls
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
