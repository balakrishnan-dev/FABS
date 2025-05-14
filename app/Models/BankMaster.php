<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'account_number',
        'ifsc_code',
        'branch',
        'ledger_id' 
    ];

    public function ledger()
    {
        return $this->belongsTo(LedgerMaster::class, 'ledger_id');
    }

}
