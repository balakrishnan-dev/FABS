<?php

// app/Models/GstConfiguration.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GstConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'gst_status',
        'gst_percentage',
        'effective_from',
        'is_active',
    ];
}
