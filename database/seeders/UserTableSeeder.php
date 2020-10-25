<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'      => 'Company A',
            'email'     => 'company1@admin.com',
            'password'  =>  Hash::make('password'),
        ])->assignRole('company');

        User::create([
            'name'      => 'Company B',
            'email'     => 'company2@admin.com',
            'password'  =>  Hash::make('password'),
        ])->assignRole('company');

        User::create([
            'name'      => 'Company C',
            'email'     => 'company3@admin.com',
            'password'  =>  Hash::make('password'),
        ])->assignRole('company');

        User::create([
            'name'      => 'Customer A',
            'email'     => 'customer1@admin.com',
            'password'  =>  Hash::make('password'),
        ])->assignRole('customer');

        User::create([
            'name'      => 'Customer B',
            'email'     => 'customer2@admin.com',
            'password'  =>  Hash::make('password'),
        ])->assignRole('customer');
    }
}
