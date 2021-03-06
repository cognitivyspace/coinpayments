<?php

namespace CognitivySpace\Coinpayments\Enums;

class IpnStatus
{
    const PAYPAL_REFUND = -2;
    const CANCELLED_TIMED_OUT = -1;
    const WAITING_FOR_FUNDS = 0;
    const CONFIRMED_COIN_RECEPTION = 1;
    const QUEUED_FOR_NIGHTLY_PAYOUT = 2;
    const PAYPAL_PENDING = 3;
    const PAYMENT_COMPLETE = 100;

    static function isComplete($status)
    {
        return intval($status) >= self::PAYMENT_COMPLETE;
    }
}
