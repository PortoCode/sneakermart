<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->integer('delivery_info_id')->unsigned();
            $table->float('total_price');
            $table->float('shipping_fee');
            $table->boolean('is_paid');
            $table->timestamp('order_date');
            $table->boolean('is_delivered');
            $table->timestamps();
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('delivery_info_id')->references('id')->on('delivery_infos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
