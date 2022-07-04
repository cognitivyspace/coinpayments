<?php

namespace CognitivySpace\Coinpayments\Observables;

use CognitivySpace\Coinpayments\Models\Deposit;
use CognitivySpace\Coinpayments\Enums\IpnStatus;
use CognitivySpace\Coinpayments\Events\Deposit\DepositCreated;
use CognitivySpace\Coinpayments\Events\Deposit\DepositUpdated;
use CognitivySpace\Coinpayments\Events\Deposit\DepositComplete;

class DepositObservable
{
    public function updated(Deposit $deposit)
    {
        event(new DepositUpdated($deposit));
        $this->checkStatus($deposit);
    }

    public function created(Deposit $deposit)
    {
        event(new DepositCreated($deposit));
        $this->checkStatus($deposit);
    }

    private function checkStatus(Deposit $deposit)
    {
        if (IpnStatus::isComplete($deposit->status)) {
            event(new DepositComplete($deposit));
        }
    }
}
