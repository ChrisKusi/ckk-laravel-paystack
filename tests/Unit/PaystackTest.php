<?php

namespace ChrisKusi\PaystackCustom\Tests\Unit;

use ChrisKusi\PaystackCustom\Facades\Paystack;
use ChrisKusi\PaystackCustom\Tests\TestCase;


class PaystackTest extends TestCase
{
    private Paystack $paystack;

    public function setUp(): void
    {
        parent::setUp();
        $this->paystack = new Paystack('sk_*');
    }

    /** @test */
    public function an_instance_of_paystack_has_been_created()
    {
        $this->assertInstanceOf(Paystack::class, $this->paystack);
    }

    /** @test */
    public function a_paystack_connection_has_been_created()
    {
        $this->assertNotEmpty(Paystack::getConnection());
    }
}
