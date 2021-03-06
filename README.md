<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation Version

* [Laravel](https://laravel.com/docs/8.x) 8.11.2
* [Composer](https://getcomposer.org/) 2.0.0
* [PHP](https://windows.php.net/downloads/releases/archives/) 7.3.16

## Other Dependencies Installed

* [Laravel/UI](https://laravel.com/docs/7.x/frontend)
* [Spatie/Laravel-Permission](https://spatie.be/docs/laravel-permission/v3/installation-laravel)
* [Balping/Laravel-Hashslug](https://github.com/balping/laravel-hashslug)

## Purpose of Project

This project is used for an interview for [Kollect Systems](https://kollect.biz/)

## Installation Instructions

- Install the vendors
```
composer install
```
- Create the .env file
```
cp env.example .env
```

- Edit .env file with your local database credentials
- Generate key token
```
php artisan key:generate
```
- Migrate database with seed
```
php artisan migrate:fresh --seed
```
- Run project
```
php artisan serve
```

## User Credential

Companies
* company1@admin.com password
* company2@admin.com password
* company3@admin.com password

Customers
* customer1@admin.com password
* customer2@admin.com password

Credentials can be updated at
* database\seeders\UserTableSeeder.php
Note: make sure to assign the roles to either 'company' or 'customer' when adding new user

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
