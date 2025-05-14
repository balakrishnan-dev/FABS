<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'fabric_type',
        'purchase_date',
        'quantity',
        'rate',
        'total_cost'
    ];
}
