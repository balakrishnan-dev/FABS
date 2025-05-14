<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearCreation extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name', 'no_of_business', 'address', 'place', 'pin', 'std', 'phone_no',
        'fax', 'email', 'inc_tax_pan_no', 'pin_no', 'cst_no', 'ecc_no', 'cerc_no', 
        'range', 'division', 'commission_rate', 'location_date'
    ];
}
