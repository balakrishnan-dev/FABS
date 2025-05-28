<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignChartWarp extends Model
{
    protected $fillable = [
        'design_chart_id', 'count', 'colour', 'warp', 'type', 'set', 'ext', 'db'
    ];

    public function designChart()
    {
        return $this->belongsTo(DesignChart::class);
    }
}
