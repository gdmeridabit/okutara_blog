# Okutara
## Pre-requisites
* php 7.3.8
* laravel 5.8
* MySQL
* Composer
* npm

## Getting Started
### Install dependencies
````
    composer install
    npm install
````
### Configure Database
1. open ".env"
2. change and update the following
````
DB_CONNECTION=mysql
DB_HOST=<HOST>
DB_PORT=<PORT>
DB_DATABASE=<DATABASE>
DB_USERNAME=<USERNAME>
DB_PASSWORD=<PASSWORD>
````

### Table Migration and Seed Data

````
php artisan migrate:refresh --seed

````

Run using your web server and happy coding!

