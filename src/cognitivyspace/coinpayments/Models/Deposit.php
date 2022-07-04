<?php

namespace CognitivySpace\Coinpayments\Models;

/**
 * Class Transaction
 *
 * @property number         id
 * @property string         address
 * @property string         txn_id
 * @property int            status
 * @property string         status_text
 * @property string         currency
 * @property int            confirms
 * @property string         amount
 * @property string         amounti
 * @property string         fee
 * @property string         feei
 * @property string         dest_tag
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Deposit extends Model
{
    public $fillable = ['address', 'txn_id', 'status', 'status_text', 'currency', 'confirms', 'amount', 'amounti', 'fee', 'feei', 'dest_tag'];
}
