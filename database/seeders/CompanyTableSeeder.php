<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name'      => 'Awesome Company',
        ]);

        Company::create([
            'name'      => 'Steel Sdn Bhd',
        ]);

        Company::create([
            'name'      => 'Digital Prospect Pvt. Ltd.',
        ]);
    }
}
