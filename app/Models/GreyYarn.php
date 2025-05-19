<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreyYarn extends Model
{
    use HasFactory;
    protected $fillable = [
        'count', 'group_name', 'yarn_name', 'count_name', 'type',
        'unit', 'warp_otam', 'weft_otam', 'seer_warp_otam',
        'purchase_date', 'opening_stock', 'pootu', 'bondhu_bundle',
        'pootu_bondhu', 'pootu_bundle'
    ];
}
