<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'manage_roles']);
    }
}
