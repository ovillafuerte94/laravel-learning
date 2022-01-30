## Laravel Learning

A simple learning project based on Laravel 8.x.

## Requirements

* PHP version: >= 8.0
* Composer
* Node.js

## Clone repository and install packages

```bash
git clone https://github.com/ingenius-hq/laravel-learning.git
cd laravel-learning
composer install
npm install
npm run dev # or npm run prod
```

## Setting up database
- Edit file `.env`. If this file does not exist you can create it by copying the content of the `.env.example` file.
- Configure the database data (name, location, user and password).

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=password
```

- Once the parameters have been configured, create a database for the project and import the tables with the following command:

```bash
php artisan migrate --seed
```

## Open in browser
Through the terminal in the project folder, execute the command
```bash
php artisan serve
```
