<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lorry extends Model
{
    use HasFactory;
    protected $fillable = [
        'loom_type',
        'sales_no',
        'no_value',
        'date',
        'party_name',
        'place_name',
        'attn',
        'GRN_no'
    ];
}
