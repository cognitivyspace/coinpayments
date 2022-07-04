<?php

namespace CognitivySpace\Coinpayments\Events\Deposit;

use CognitivySpace\Coinpayments\Events\Event;
use CognitivySpace\Coinpayments\Models\Deposit;

abstract class AbstractDepositEvent extends Event
{
    /**
     * @var Deposit
     */
    public $deposit;

    public function __construct(Deposit $deposit)
    {
        $this->deposit = $deposit;
    }
}
