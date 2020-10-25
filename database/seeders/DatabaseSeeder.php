<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionRoleTableSeeder::class,
            UserTableSeeder::class,
            CompanyTableSeeder::class,
            CompanyUserTableSeeder::class,
            CustomerTableSeeder::class,
            TransactionTableSeeder::class,
            PaymentTableSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
