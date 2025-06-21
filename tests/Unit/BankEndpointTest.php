<?php

namespace ChrisKusi\PaystackCustom\Tests\Unit;

use ChrisKusi\PaystackCustom\Facades\Paystack;
use ChrisKusi\PaystackCustom\Tests\TestCase;
use Illuminate\Support\Facades\Http;

class BankEndpointTest extends TestCase
{
    /** @test */
    public function it_returns_a_list_of_banks()
    {
        Http::fake(
            [
                'https://api.paystack.co/bank' => Http::response(
                    json_decode(
                        file_get_contents('tests/stubs/endpoints/bank/list_banks.json'),
                        true
                    ),
                    200, ['Headers']
                ),
            ]
        );

        $response = Paystack::bank()
            ->list([])->response();

        Http::assertSentCount(1);
        $this->assertTrue($response['status']);
        $this->assertEquals('Banks retrieved', $response['message']);
        $this->assertIsArray($response['data']);
    }
}
