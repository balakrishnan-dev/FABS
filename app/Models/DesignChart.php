<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignChart extends Model
{
    use HasFactory;

    protected $fillable = [
        'loom_type', 'order_type', 'cl_no', 'design_name',
        'read', 'pick', 'width', 'order_mts', 'warp_ends',
        'r_reed', 'r_pick', 'wa_weet', 'we_weet', 'weft_mts',
        'pin', 'we_ord_mts', 'wea_wt', 'warp_wt', 'total_picks',
    ];


   public function warps()
{
    return $this->hasMany(Warp::class);
}

public function wefts()
{
    return $this->hasMany(Weft::class);
}

}
