<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'          => 'company',
            'guard_name'    =>  'web',
        ]);

        Permission::create([
            'name'          => 'customer',
            'guard_name'    =>  'web',
        ]);
    }
}
