<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narration extends Model
{
    use HasFactory;
    protected $fillable = ['narration_name'];
}
