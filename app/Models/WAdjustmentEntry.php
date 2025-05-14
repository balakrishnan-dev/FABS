<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WAdjustmentEntry extends Model
{
    protected $fillable = ['ledger_id', 'date', 'amount', 'type', 'note'];

    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }
}
