# ckk-laravel-paystack

This package provides an expressive and convenient way to interact with the Paystack API within your Laravel application, customized for Laravel 12 and PHP 8.3.

## Installation

> **Requires [PHP 8.1+](https://php.net/releases/)**

You can install the package via composer:

```bash
composer require chriskusi/ckk-laravel-paystack
```

## Usage

Open your `.env` file and add your public key, secret key, callback URL, and webhook:

```dotenv
PAYSTACK_PUBLIC_KEY=pk_xxxxxxxxxxxxx
PAYSTACK_SECRET_KEY=sk_xxxxxxxxxxxxx
```

This package provides a fluent interface to interact with the Paystack API. To learn all about it, head over to [the documentation](https://chriskusi-ckk-laravel-paystack.netlify.app) (once hosted).

Here are some of the things you can do with this package.

```php
/**
 * Initialize a new payment, and return the response from the API call
 */
Paystack::transaction()->initialize($paymentData)->response();

/**
 * Using the helper function
 */
paystack()->transaction()->initialize($paymentData)->response();
```

You can also get specific data from the API call by passing the key of the data you want to return as an argument in the `response()` method.

```php
/**
 * Initialize a new payment, and return only the authorization URL
 */
Paystack::transaction()->initialize($paymentData)->response('data.authorization_url');

/**
 * Using the helper function
 */
paystack()->transaction()->initialize($paymentData)->response('data.authorization_url');
```

Alternatively, this package provides a fluent method to fetch only the authorization URL.

```php
/**
 * Initialize a new payment, and return the authorization URL
 */
Paystack::transaction()->initialize($paymentData)->authorizationURL();

/**
 * Using the helper function
 */
paystack()->transaction()->initialize($paymentData)->authorizationURL();
```

## Documentation

You'll find the documentation on [https://chriskusi-ckk-laravel-paystack.netlify.app](https://chriskusi-ckk-laravel-paystack.netlify.app) (to be set up). For now, refer to the original guide at [https://laravel-paystack.netlify.app](https://laravel-paystack.netlify.app) as a starting point.

Find yourself stuck using the package? Found a bug? Do you have general questions or suggestions for improving it? Feel free to [create an issue on GitHub](https://github.com/chriskusi/ckk-laravel-paystack/issues), and I’ll address it as soon as possible.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email [kusichris656@gmail.com](mailto:kusichris656@gmail.com) instead of using the issue tracker.

## Credits

- [Christian Kusi](https://github.com/chriskusi)
- [Olayemi Olatayo](https://github.com/iamolayemi) (Original Developer)
- [All Contributors](../../contributors)

## Alternatives

- [iamolayemi/laravel-paystack](https://github.com/iamolayemi/laravel-paystack) (Original Package)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


