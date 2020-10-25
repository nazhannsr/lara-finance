<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'          => 'company',
            'guard_name'    => 'web',
        ]);

        Role::create([
            'name'          => 'customer',
            'guard_name'    => 'web',
        ]);
    }
}
