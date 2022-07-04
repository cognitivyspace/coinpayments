<?php

namespace CognitivySpace\Coinpayments\Models;
use Illuminate\Support\Collection;

/**
 * Class Transaction
 *
 * @property mixed                   id
 * @property mixed                   created_at
 * @property mixed                   updated_at
 * @property Withdrawal[]|Collection $withdrawals
 */
class MassWithdrawal extends Model
{
    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
}
