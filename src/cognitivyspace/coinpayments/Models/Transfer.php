<?php

namespace CognitivySpace\Coinpayments\Models;

/**
 * Class Transaction
 * @property mixed id
 * @property mixed amount
 * @property mixed currency
 * @property mixed merchant
 * @property mixed pbntag
 * @property mixed auto_confirm
 * @property mixed status
 * @property mixed created_at
 * @property mixed updated_at
 */
class Transfer extends Model
{
    public $fillable = ['amount', 'currency', 'merchant', 'pbntag', 'auto_confirm', 'ref_id', 'status'];
}
