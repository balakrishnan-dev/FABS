<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable = ['name'];

    public function adjustments()
    {
        return $this->hasMany(WAdjustmentEntry::class);
    }
        public function group()
    {
        return $this->belongsTo(\App\Models\GroupMaster::class, 'group_id');
    }

}
