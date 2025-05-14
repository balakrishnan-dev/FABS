<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeavingMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'design_name',
        'cl_no',
        'party_name',
        'shade',
        'weaving_date',
    ];

    protected $dates = ['weaving_date'];
}
