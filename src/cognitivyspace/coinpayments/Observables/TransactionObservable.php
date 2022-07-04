<?php

namespace CognitivySpace\Coinpayments\Observables;

use CognitivySpace\Coinpayments\Enums\IpnStatus;
use CognitivySpace\Coinpayments\Models\Transaction;
use CognitivySpace\Coinpayments\Events\Transaction\TransactionCreated;
use CognitivySpace\Coinpayments\Events\Transaction\TransactionUpdated;
use CognitivySpace\Coinpayments\Events\Transaction\TransactionComplete;

class TransactionObservable
{
    public function updated(Transaction $transaction)
    {
        event(new TransactionUpdated($transaction));
        $this->checkStatus($transaction);
    }

    public function created(Transaction $transaction)
    {
        event(new TransactionCreated($transaction));
        $this->checkStatus($transaction);
    }

    private function checkStatus(Transaction $transaction)
    {
        if (IpnStatus::isComplete($transaction->status)) {
            event(new TransactionComplete($transaction));
        }
    }
}
