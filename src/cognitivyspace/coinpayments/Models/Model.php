<?php namespace CognitivySpace\Coinpayments\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    /**
     * Defines the prefix for the table.
     * @param array $attr
     */

    public function __construct($attr = [])
    {
        $this->table = cp_table_prefix() . self::getTable(); #Fix multiple prefix issue
        parent::__construct($attr);
    }
    # Removed getTable method to fix multiple prefix issue
}
