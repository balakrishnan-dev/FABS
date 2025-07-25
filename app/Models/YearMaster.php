<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearMaster extends Model
{
    use HasFactory;
    protected $fillable = ['year_name', 'start_date', 'end_date'];

}
