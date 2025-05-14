<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DyerOpening extends Model
{
    use HasFactory;
    protected $fillable = ['dyer_name','place'];
}
