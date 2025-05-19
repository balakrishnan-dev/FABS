<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class PackingSlip extends Model
{
   use HasFactory;
    protected $fillable = [
        'loom_type',
        'order_type',
        'no',
        'no_value',
        'date',
        'party_name',
        'place_name',
    ];

}
