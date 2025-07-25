<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdjustmentEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'ledger', 'amount', 'type', 'note'
    ];
}
