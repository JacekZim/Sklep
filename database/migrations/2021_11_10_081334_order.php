<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
           $table->id();
            $table->string('name');
            $table->string('adres');
            $table->integer('user_id');
            $table->string('telefon');
            $table->string('status')->default('new');
            $table->timestamps();
        });
        Schema::create('orders_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('qty');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


        Schema::dropIfExists('orders');
        Schema::dropIfExists('orders_products');

    }
}
