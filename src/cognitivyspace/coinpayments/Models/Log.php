<?php

namespace CognitivySpace\Coinpayments\Models;

class Log extends Model
{
    protected $table = 'log';

    const LEVEL_ALL = 2;
    const LEVEL_ERROR = 1;
    const LEVEL_NONE = 0;

    public $fillable = ['type', 'log'];
}
