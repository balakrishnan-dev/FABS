<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreyYarn extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'code', 'description'];

    public function yarnPurchases()
    {
        return $this->hasMany(YarnPurchase::class);
    }

    public function yarnStocks()
    {
        return $this->hasMany(YarnStock::class);
    }

    public function yarnDisplays()
    {
        return $this->hasMany(YarnDisplay::class);
    }
}
