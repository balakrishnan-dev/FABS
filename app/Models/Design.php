<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;

    protected $fillable = [
        'loom_type',
        'order_type',
        'cl_no',
        'design_name',
        'po_no',
        'weaving_type',
        'pick',
        'read',
        'rate_per_mts',
        'width',
        'weaver_mts',
        'order_mts',
        'welt_mts',
        'order_date',
        'count',
        'buyer_name',
        'attention',
    ];
}
