## Room Booking System

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Room Booking System is a generic Room Booking System. It is built as a part of Software Engineering course project. It is a built using **Laravel PHP Framework**, **MySQL** database, **Bootstrap**.

## Installation

1. Install *Apache Web Server >v2.4.9* with *PHP v5.5.x* support, *MySQL >v5.6.17* independently or install Wamp Server v2.5 or later from the [WampServer](http://www.wampserver.com/en/) site. WampServer includes the required packages.
2. Install Laravel PHP Framework by following the guide at [Laravel Docs](http://laravel.com/docs/5.1/)
> php artisan migrate
3. Go to the web directory where the code is installed on the server in command prompt/terminal. Run the following command to create the remaining parts of the database
4. Run the following command to create the default user
> php artisan db:seed
5. To setup the Room Information, run the *room_info.sql* SQL script in `/public/init.scripts` directory. 
6. Go to the URL which you have setup for the project 
> for e.g. http://localhost:8000/
You should get the home page of the application.

## Developers

* Sanket 
* Abhay

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

### License

This project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
