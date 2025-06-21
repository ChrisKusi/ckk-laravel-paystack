# Installation
The `ckk-laravel-paystack` package can be installed via Composer:

> **Requires [PHP 8.1+](https://php.net/releases/) and [Laravel 12.0+](https://laravel.com/docs/12.x)**

```bash
composer require chriskusi/ckk-laravel-paystack
```

## Configuration
You may publish the package configuration file by running the following command:

```bash
php artisan vendor:publish --provider="ChrisKusi\PaystackCustom\PaystackServiceProvider"
```

A configuration file named **`paystack.php`** will be placed in the **`config`** folder.

## Environment Settings

Open your `.env` file and add your public key, secret key, callback URL, and webhook:

```dotenv
PAYSTACK_PUBLIC_KEY=pk_xxxxxxxxxxxxx
PAYSTACK_SECRET_KEY=sk_xxxxxxxxxxxxx
```

Congratulations :tada::tada::tada:, you are ready to start developing your application with this package!

