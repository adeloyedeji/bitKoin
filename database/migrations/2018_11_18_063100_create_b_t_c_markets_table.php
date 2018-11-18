<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBTCMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_t_c_markets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->double('price');
            $table->double('minimum_amount');
            $table->double('maximum_amount');
            $table->integer('seller_id');
            $table->integer('buyer_id')->nullable();
            $table->double('usd_amount');
            $table->double('naira_amount');
            $table->double('total_amount');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('b_t_c_markets');
    }
}
