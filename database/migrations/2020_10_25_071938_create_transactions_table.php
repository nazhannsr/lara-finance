<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->string('transaction_name');
            $table->double('total_price', 2);
            $table->double('outstanding_balance', 2);
            $table->double('total_payment', 2);
            $table->timestamp('payment_due');
            $table->timestamp('payment_date')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('company_user_id');
            $table->unsignedBigInteger('company_id');
            $table->timestamps();

            //FOREIGN KEYS
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('company_user_id')->references('id')->on('company_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
