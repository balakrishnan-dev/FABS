<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/GstConfigMaster.php

class GstConfigMaster extends Model
{
    use HasFactory;

    protected $fillable = ['gst_status', 'gst_percentage'];
}
