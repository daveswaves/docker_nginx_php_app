# A Docker PHP / MySQL Nginx Web Server

### Uses MySQL v8.0, PHP v8.2 and the latest Nginx:

```
app/
   index.php

nginx/
   Dockerfile
   nginx.conf

docker-compose.yml
Dockerfile
.env
```

It also creates a phpMyAdmin instance which can be accessed on port 8081.

The database access details are stored in .env

The root Dockerfile defines the PHP image (php:8.2-fpm) and PHP extensions (mysqli pdo pdo_mysql).

The nginx/Dockerfile defines the Nginx image (nginx:latest) and copies custom nginx/nginx.conf over  
to set up PHP params.

Server Access: http://localhost:8080 | phpMyAdmin Access: http://localhost:8081

NOTE:  
Ports may require editing if they conflict with existings ports on your local machine.  
Web server runs on port 8080 and phpMyAdmin on 8081.  
I had to change MySQL port from 3306 to 3307, due to a conflict.



### Useful Docker commands
```
docker compose up
docker compose up --build
docker compose down

docker ps -a         # view containers
docker images -a     # view images

docker rm [ID]       # delete containers
docker image rm [ID] # delete images
```