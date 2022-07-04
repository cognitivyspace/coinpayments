<?php

namespace CognitivySpace\Coinpayments\Models;

/**
 * Class Transaction
 *
 * @property mixed id
 * @property mixed amount
 * @property mixed from
 * @property mixed to
 * @property mixed address
 * @property mixed dest_tag
 * @property mixed created_at
 * @property mixed updated_at
 */
class Conversion extends Model
{
    protected $fillable = ['amount', 'from', 'to', 'address', 'dest_tag', 'ref_id'];
}
