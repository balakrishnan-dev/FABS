<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizingMaster extends Model
{
    use HasFactory;

    protected $table = 'sizing_masters';

    protected $fillable = [
        'loom_type',
        'order_type',
        'cl_no',
        'particulars',
        'sizing_name',
        'date_from',
        'date_to',
    ];

    protected $dates = [
        'date_from',
        'date_to',
    ];
}
