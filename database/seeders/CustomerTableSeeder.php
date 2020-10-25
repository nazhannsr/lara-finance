<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'user_id'       => 4,
            'company_id'    => 1,
        ]);

        Customer::create([
            'user_id'       => 4,
            'company_id'    => 2,
        ]);

        Customer::create([
            'user_id'       => 5,
            'company_id'    => 1,
        ]);

        Customer::create([
            'user_id'       => 5,
            'company_id'    => 2,
        ]);

        Customer::create([
            'user_id'       => 5,
            'company_id'    => 3,
        ]);
    }
}
