<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    

    // Define the relationship with roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
