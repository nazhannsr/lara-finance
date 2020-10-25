<?php

namespace Database\Seeders;

use App\Models\CompanyUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyUser::create([
            'user_id'       => 1,
            'company_id'    => 1,
        ]);

        CompanyUser::create([
            'user_id'       => 2,
            'company_id'    => 2,
        ]);

        CompanyUser::create([
            'user_id'       => 3,
            'company_id'    => 3,
        ]);
    }
}
