<?php

// app/Models/Warp.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warp extends Model
{
    use HasFactory;

    protected $fillable = [
        'design_chart_id', 'count', 'colour', 'warp', 'type', 'set', 'ext', 'db'
    ];

    public function designChart()
    {
        return $this->belongsTo(DesignChart::class);
    }
}
