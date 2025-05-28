<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignChartWeft extends Model
{
    protected $fillable = [
        'design_chart_id', 'count', 'colour', 'weft', 'type', 'set', 'ext', 'db'
    ];

    public function designChart()
    {
        return $this->belongsTo(DesignChart::class);
    }
}
