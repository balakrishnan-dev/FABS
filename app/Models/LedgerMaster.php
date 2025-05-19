<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GroupMaster;
use App\Models\BankMaster;

class LedgerMaster extends Model
{
       use HasFactory;
       protected $fillable = [
        'ledger_name',
        'group_id',
        'opening_balance',
        'balance_type',
        'is_active',
    ];

    // Relationship: A Ledger belongs to a Group
 
    public function group()
    {
        return $this->belongsTo(GroupMaster::class, 'group_id');
    }

    public function banks()
    {
        return $this->hasMany(BankMaster::class, 'ledger_id');
    }

}
