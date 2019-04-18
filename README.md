# graphql-symfony-skeleton

Getting started
===============
This project is copied from 
    https://github.com/duck-invaders/graphql-symfony

This is a complete stack for running Symfony 4 (latest version: Flex) into Docker containers using docker-compose tool.

I'll try to add some others fixtures :
 - phpmyadmin
 - makefile (To do)
 - TestUnit (To do)

Prerequisites
-------------

This bundle requires Symfony 4 and the openssl extension.

Installation
------------
    
1. First, clone this repository:
```bash
$ git clone https://github.com/tigersf2/graphql-symfony-skeleton.git
```

2. Start Containers and install dependencies

    
Next, put your Symfony application into symfony folder and do not forget to add symfony.localhost in your /etc/hosts 
file.

Make sure you adjust database_host in parameters.yml to the database container alias "db"

Then, run:

```bash
$ docker-compose up -d
$ docker-compose exec php sh
$ composer install
```
    
3. Configure database into .env file
```bash
DATABASE_URL=mysql://symfony:symfony@db:3306/symfony
```

Note : you can rebuild all Docker images by running:

```bash
$ docker-compose build
```  

Access
------
You are done, you can visit your Symfony application

1. Symfony application

```bash
http://symfony.localhost
```
2. Kibana

```bash
http://symfony.localhost:81
```
3. phpmyadmin

```bash
http://symfony.localhost:9191
```
