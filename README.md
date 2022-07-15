# Simple blog

## Installation & Configuration

### Download project
```
wget https://github.com/vulhub/vulhub/archive/master.zip -O vulhub-master.zip
unzip vulhub-master.zip
cd vulhub-master
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
symfony console doctrine:migrations:migrate
symfony console doctrine:fixtures:load
```

## Tests
Execute this command to run tests:
```
docker exec -it php /bin/sh
./vendor/bin/phpunit
```