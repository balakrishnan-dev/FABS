<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'financial_year_from',
        'financial_year_to',
        'company_name',
        'nature_of_business',
        'address',
        'place',
        'pin',
        'std',
        'phone_no',
        'fax',
        'tel',
        'income_tax_no',
        'sales_tax_no',
        'cst_no',
        'password',
        'short_name',
        'email',
        'tin_no',
        'ecc_no',
        'cerc_no',
        'range',
        'division',
        'commission_rate',
        'location_code_no',
        'pan_no',
        'default_year',
        'remarks',
        'types',
    ];
}
