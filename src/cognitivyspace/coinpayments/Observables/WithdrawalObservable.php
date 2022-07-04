<?php

namespace CognitivySpace\Coinpayments\Observables;

use CognitivySpace\Coinpayments\Models\Withdrawal;
use CognitivySpace\Coinpayments\Enums\WithdrawalStatus;
use CognitivySpace\Coinpayments\Events\Withdrawal\WithdrawalCreated;
use CognitivySpace\Coinpayments\Events\Withdrawal\WithdrawalUpdated;
use CognitivySpace\Coinpayments\Events\Withdrawal\WithdrawalComplete;

class WithdrawalObservable
{
    public function updated(Withdrawal $withdrawal)
    {
        event(new WithdrawalUpdated($withdrawal));
        $this->checkStatus($withdrawal);
    }

    public function created(Withdrawal $withdrawal)
    {
        event(new WithdrawalCreated($withdrawal));
        $this->checkStatus($withdrawal);
    }

    private function checkStatus(Withdrawal $withdrawal)
    {
        if (WithdrawalStatus::COMPLETE === $withdrawal->status) {
            event(new WithdrawalComplete($withdrawal));
        }
    }
}
