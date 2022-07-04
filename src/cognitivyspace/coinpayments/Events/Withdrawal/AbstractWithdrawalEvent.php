<?php

namespace CognitivySpace\Coinpayments\Events\Withdrawal;

use CognitivySpace\Coinpayments\Events\Event;
use CognitivySpace\Coinpayments\Models\Withdrawal;

class AbstractWithdrawalEvent extends Event
{
    /**
     * @var Withdrawal
     */
    public $withdrawal;

    public function __construct(Withdrawal $withdrawal)
    {
        $this->withdrawal = $withdrawal;
    }
}
