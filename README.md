EmailService
============
It's self learning project to get knowledge with microservices.
Microservice architecture, or simply microservices, is a distinctive method of developing software systems.

Micro Framework for Microservices - it's simple!
------------------------------------------------
Micro Framework gives us the opportunity to take advantage of the basic components and create their own application architecture (with all its consequences).

Symfony Microkernel
-------------------
The best thing about the Symfony microframework is that you are building your application on the shoulders of Symfony, meaning that you won't face any of the usual restrictions of the microframeworks. All the incredible Symfony features and bundles are ready to use in case you need them as your application grows.

###Getting started

In order to set up this application you need clone this repo:

```git clone https://github.com/tarnawski/symfony-microkernel.git```

And you have to install dependencies:

```
cd symfony-microkernel

composer install
```

####1. The quickest way to set up

Just create database and run PHP server:

```
php bin/console doctrine:schema:create --force
php -S localhost:8001
```

####2. Run with Vagrant and prepared environment:

```
cd vagrant && vagrant up 
```


When the process is complete, get into the machine:
```
vagrant ssh
cd /var/www/emailservice/
```

Creating schema:
```
php bin/console doctrine:schema:create --force
```  

Add to your hosts:
```
10.0.0.200 emailservice.dev
```



####3. Do you like Docker? Me too!

Just run this command in project catalog:
```
docker-compose run
```

###That's all! Now you can start to use app!!!

Tests
-----

The project includes Behat test. Command to run all scenarios:
```
bin/behat
```

To run PHPSpec:
```
bin/phpspec run
```

In the project I use static analysis  tools:
- PHP_CodeSniffer
- PHP Depend
- Copy/Paste Detector
- PHP Mess Detector

To to execute all tests run build task with Ant tools:
```
ant build
```

Endpoint documentation:
-----------------------

| Method | Path         |  Description                     |
|--------|--------------|----------------------------------|
| GET    | /            |  Only for test API               |
| GET    | /emails      |  Return list of email address    |
| GET    | /emails/{id} |  Return single email address     |             
| POST   | /emails      |  Create new email address        |             
| DELETE | /emails/{id} |  Delete email address            |        
     
Apache Kafka implement
======================

This microservice is adapted to work with Apache Kafka. When new email appear in system application automaticly report status "CHANGED" to Kafka.
To enable connetion you must set a few parameters:
```
kafka_enable 
kafka_host
kafka_port
kafka_topic
```

By default connection is disabled.

Repository with Apache Kafka and Zookeeper:
```
https://github.com/tarnawski/kafka.git
```