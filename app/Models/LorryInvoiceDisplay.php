<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LorryInvoiceDisplay extends Model
{
    use HasFactory;
    protected $fillable = [
    'loom_type',
    'order_type',
    'CL_No',
    'design_name',
    'party_name',
    'date_from',
    'date_to',
];
    protected $table = ['lorry_invoice_display'];
}
