# Laravel-Semilla

## Installation.

1. Run git clone https://github.com/jcjabros/Laravel-Semilla.git

2. Run `composer install`

3. Copy .env.example file to .env on the root folder.

4.1 Create a DB on phpMyAdmin.

4.2 Open your .env file and change the database name (`DB_DATABASE`) to whatever you have, username (`DB_USERNAME`) and password (`DB_PASSWORD`) field correspond to your configuration. By default, the username is root and you can leave the password field empty. (This is for Xampp) 

5. Run `php artisan key:generate.`

6. Run `php artisan migrate.`

7. Run `php artisan serve.`
