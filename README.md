<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Table of Contents
- [Description](#description)
- [Installation](#installation)
- [Status](#Status)
- [responsible](#responsible) 

----

### Description

An E-commerce Website based on Laravel and uses APIs  

---
### Installation

- Clone this repo

```sh
git clone https://github.com/ahmedmahm/ecommerce_api.git
```

- go to root directory

- run this command to generate the application environment variables 
```sh
bin/dotenv
```
- open .env and add $DB_PASSWORD=secret

- run this to generate the application secret key 
```sh
bin/keys
```
- get the php container
```sh
docker ps
#copy the php container ID number
```
- run this to go inside the container 
```sh
docker exec -it $container_id /bin/bash
```
- now install all dependencies in the container by 
```sh
composer install
```
- go to
```sh
http://localhost
``` 
---
### Status
Under construction

### Responsible 
ahmedm.monte@gmail.com
