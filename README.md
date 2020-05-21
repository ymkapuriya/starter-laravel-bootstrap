# Laravel Starter App

## Laravel
Laravel is a massively popular web application framework with expressive, elegant syntax. Laravel takes the pain out of development by easing common tasks used in many web projects, Laravel is accessible, powerful, and provides tools required for large, robust applications.

## About Package
This package built in **[Laravel 7](https://laravel.com/)** could be considered as a starter package to start with any application to be built in Laravel using MVC architecture. Mainly it includes following features:

- Authentication 
- Routing with auth middleware
- Resource controller
- Model demonstration with relationship
- Views to perform CRUD operations
- Service provider demonstration
- Application configuration management
- Custom components

### Plugins used 

- **[Bootstrap CSS](https://getbootstrap.com/)** - Core CSS Library
- **[Laravel Collective](https://laravelcollective.com/)** - HTML and Form builder

### System Requirements
- **[Laravel System Requirements](https://laravel.com/docs/7.x/installation)**
- **[Compoer](https://getcomposer.org/)**
- **[npm](https://www.npmjs.com/)**

### Setup & Installation

#### Source code
Download the source code and then run following commands from source folder.
```
$ composer install
$ npm install
$ npm run dev
```

#### Environment
Create database user along with database and update detail in .env file. Then run following command from the source folder. It will create auth tables and two other tables `designations` and `staff_members` in the database.
```
php artisan migrate --seed
```
This will create necessary tables and one user account to start with. Remember this authentication module for this application is built without regitration support.

| Username | Password |
| -------- | -------- |
| admin@email.com | simple |

#### Execution
Run the following command to start application.
```
php artisan serve
```

#### Troubleshooting
In case some error occurs, you could try follwing commands to solve cache related errors.
```
php artisan optimize:clear
php artisan optimize
composer dump-autoload
```

### Note
Remember this is just a basic application to start with. In order to explore more you, can visit **[`Laravel's official documentation`](https://laravel.com/docs/7.x)**.

## License
This software is licensed under the [MIT license](https://opensource.org/licenses/MIT).