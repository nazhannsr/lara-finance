<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'invoice_number'        => '00000001',
            'transaction_name'      => 'White Shirt x2',
            'total_price'           => 100.00,
            'outstanding_balance'   => 100.00,
            'total_payment'         => 0.00,
            'payment_due'           => Carbon::parse('2/10/2020'),
            'customer_id'           => 2,
            'company_id'            => 2,
            'company_user_id'       => 2,
        ]);

        Transaction::create([
            'invoice_number'        => '00000002',
            'transaction_name'      => 'White Shirt x2',
            'total_price'           => 500.00,
            'outstanding_balance'   => 500.00,
            'total_payment'         => 0.00,
            'payment_due'           => Carbon::parse('2/11/2020'),
            'customer_id'           => 1,
            'company_id'            => 1,
            'company_user_id'       => 1,
        ]);

        Transaction::create([
            'invoice_number'        => '00000003',
            'transaction_name'      => 'White Shirt x2',
            'total_price'           => 300.00,
            'outstanding_balance'   => 300.00,
            'total_payment'         => 0.00,
            'payment_due'           => Carbon::parse('2/10/2020'),
            'customer_id'           => 3,
            'company_id'            => 1,
            'company_user_id'       => 1,
        ]);

        Transaction::create([
            'invoice_number'        => '00000004',
            'transaction_name'      => 'White Shirt x2',
            'total_price'           => 500.00,
            'outstanding_balance'   => 250.00,
            'total_payment'         => 250.00,
            'payment_due'           => Carbon::parse('2/11/2020'),
            'customer_id'           => 4,
            'company_id'            => 2,
            'company_user_id'       => 2,
        ]);

        Transaction::create([
            'invoice_number'        => '00000005',
            'transaction_name'      => 'White Shirt x2',
            'total_price'           => 800.00,
            'outstanding_balance'   => 800.00,
            'total_payment'         => 0.00,
            'payment_due'           => Carbon::parse('2/10/2020'),
            'customer_id'           => 5,
            'company_id'            => 3,
            'company_user_id'       => 3,
        ]);
    }
}
