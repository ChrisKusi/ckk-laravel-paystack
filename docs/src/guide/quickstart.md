# Quickstart Tutorial

This tutorial focuses on getting you started with the `ckk-laravel-paystack` package quickly. We recommend following this tutorial just to get things working so that you can play with the package.

Make sure you've already installed this package in your project. You can check out our [Installation Guide](/installation) on how to install `ckk-laravel-paystack` on your project.

In this tutorial, we will be implementing a simple payment gateway using this package.

## Setup Routes

Let's get started by setting up all the necessary route endpoints.

```php
// The route that the button calls to initialize payment
Route::post('/paystack/initialize', [PaymentController::class, 'initialize'])
    ->name('pay');

// The callback URL after a payment
Route::get('/paystack/callback', [PaymentController::class, 'callback'])
    ->name('callback');
```

## Setup Views

In this section, let's set up our views to collect payment information.

```html
<h3>Make Payment: N1500.00</h3>

<form method="POST" action="{{ route('pay') }}">
    @csrf

    <input name="name" placeholder="Name" />
    <input name="email" type="email" placeholder="Your Email"/>
    <input type="hidden" name="amount" value="150000"/>

    <input type="submit" value="Buy"/>
</form>
```

## Setup Controller

Now, we will need to create a controller to handle your application requests. We can create the file `app/Http/Controllers/PaymentController.php` like this:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ChrisKusi\PaystackCustom\Facades\Paystack;

class PaymentController extends Controller
{
    /**
     * Initialize a new Paystack payment
     *
     * @return void
     */
    public function initialize()
    {
        // Generate a unique payment reference
        $reference = Paystack::generateReference();

        // Prepare payment details from form request
        $paymentDetails = [
            'email' => request('email'),
            'amount' => request('amount'),
            'reference' => $reference,
            'callback_url' => route('callback')
        ];

        // Initialize new payment and get the response from the API call
        $response = Paystack::transaction()
            ->initialize($paymentDetails)->response();

        if (!$response['status']) {
            // Notify that something went wrong
            return redirect()->back()->with('error', 'Payment initialization failed.');
        }

        // Redirect to authorization URL
        return redirect($response['data']['authorization_url']);
    }

    public function callback()
    {
        // Get reference from request
        $reference = request('reference') ?? request('trxref');

        // Verify payment details
        $payment = Paystack::transaction()->verify($reference)->response('data');

        // Check payment status
        if ($payment['status'] == 'success') {
            // Payment is successful
            // Code your business logic here
            return redirect()->back()->with('success', 'Payment successful!');
        } else {
            // Payment is not successful
            return redirect()->back()->with('error', 'Payment failed.');
        }
    }
}
```

