<?php

namespace CognitivySpace\Coinpayments\Facades;

use Illuminate\Support\Facades\Facade;
use CognitivySpace\Coinpayments\Providers\CoinpaymentsServiceProvider;

class Coinpayments extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return CoinpaymentsServiceProvider::SINGLETON;
    }
}
