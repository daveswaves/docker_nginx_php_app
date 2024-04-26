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
