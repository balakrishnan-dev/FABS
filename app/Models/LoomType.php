<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoomType extends Model
{
    use HasFactory;

    protected $fillable = ['loom_type','order_type','weaving_type'];
}
