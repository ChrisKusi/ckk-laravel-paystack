<?php

namespace ChrisKusi\PaystackCustom\Endpoints;

class Settlement extends Endpoint
{
    protected const ENDPOINT = '/settlement';

    /**
     * Fetch settlements made to your settlement accounts.
     *
     * @link https://paystack.com/docs/api/#page-list
     */
    public function list(array $query = []): self
    {
        $this->get($this->url(self::ENDPOINT), $query);

        return $this;
    }

    /**
     * Get the transactions that make up a particular settlement.
     *
     * @link https://paystack.com/docs/api/#settlement-fetch
     */
    public function fetch(string $settlement_id, array $query = []): self
    {
        $this->get($this->url(self::ENDPOINT).'/'.$settlement_id.'/transactions', $query);

        return $this;
    }
}
