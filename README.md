# Simple blog

## Installation & Configuration

### Download project
```
wget https://github.com/yassine-ah/blog/archive/refs/heads/main.zip -O blog.zip
unzip blog.zip
cd blog
```

### Compile & run environment
The root directory contains the docker-compose.yaml which describes the configuration of service components. 
This blog can be run in a local environment by going into the root directory and executing:
```
docker-compose build
docker-compose up -d
``` 

### Build app and load fixtures
```
docker exec -it php /bin/sh
composer install
yarn install
curl http://localhost:8080/install
```