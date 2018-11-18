<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitcoinWalletTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitcoin_wallet_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bitcoin_wallet_id');
            $table->integer('transaction_type');
            $table->text('transaction_description');
            $table->double('transaction_amount');
            $table->double('wallet_balance');
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
        Schema::dropIfExists('bitcoin_wallet_transactions');
    }
}
