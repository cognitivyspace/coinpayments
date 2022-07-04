<?php

namespace CognitivySpace\Coinpayments\Events\Transaction;

use CognitivySpace\Coinpayments\Events\Event;
use CognitivySpace\Coinpayments\Models\Transaction;

class AbstractTransactionEvent extends Event
{
    /**
     * @var Transaction
     */
    public $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }
}
