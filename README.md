<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Introduction

This boilerplate provides a simple and easy to use HTTPS Secure cookie authentication using Laravel framework with sanctum, simply clone this repository and follow the steps below.

## Installation

#1 install the packages

```console
composer install
```

#2 run the migration

```console
php artisan migrate
```

#3 serve the application

```console
php artisan serve
```

# Configuration

Add/edit the following lines to your enviorment file.

```
AUTH_DURATION=9600
AUTH_COOKIE_NAME=login
AUTH_DOMAINS=
```

## Security Vulnerabilities

If you discover a security vulnerability within this package, please send an e-mail to Taylor Otwell via [aroxsediq@gmail.com](mailto:aroxsediq@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The boilerplate software licensed under the [MIT license](https://opensource.org/licenses/MIT).
