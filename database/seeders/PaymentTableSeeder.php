<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Payment::create([
            'transaction_id'    => 1,
            'customer_id'       => 1,
            'payment_number'    => 'CSH00001',
            'payment_type'      => 'Cash',
            'payment'           => 100.00,
            'payment_status'    => 0,
        ]);

        Payment::create([
            'transaction_id'    => 1,
            'customer_id'       => 1,
            'payment_number'    => 'CSH00002',
            'payment_type'      => 'Cash',
            'payment'           => 100.00,
            'payment_status'    => 0,
        ]);

        Payment::create([
            'transaction_id'    => 4,
            'customer_id'       => 2,
            'payment_number'    => 'CSH00003',
            'payment_type'      => 'Cash',
            'payment'           => 250.00,
            'payment_status'    => 0,
        ]);

        Payment::create([
            'transaction_id'    => 4,
            'customer_id'       => 4,
            'payment_number'    => 'CSH00004',
            'payment_type'      => 'Cash',
            'payment'           => 250.00,
            'payment_status'    => 1,
        ]);
    }
}
