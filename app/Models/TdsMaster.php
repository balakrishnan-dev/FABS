<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LedgerMaster;
use App\Models\BankMaster;

class TdsMaster extends Model
{
    protected $fillable = [
        'date_from', 'date_to', 'ledger_id', 'amount', 'bill_no', 'bank_id', 'type'
    ];

    public function ledger() {
        return $this->belongsTo(LedgerMaster::class);
    }

    public function bank() {
        return $this->belongsTo(BankMaster::class);
    }
}
