<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('total_price');
            $table->integer('order_id');
            $table->string('address');
            $table->date('tanggal');
            $table->string('phone',15);
            $table->string('transaction_status')->default('PENDING'); // UNPAID/PENDING/SUCCESS/FAILED
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
