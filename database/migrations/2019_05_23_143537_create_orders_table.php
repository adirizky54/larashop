<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('invoice', 50);
            $table->integer('users_id');
            $table->string('customer_name', 50);
            $table->string('customer_country', 50);
            $table->string('customer_province', 50);
            $table->string('customer_city', 50);
            $table->string('customer_zip', 50);
            $table->string('customer_address', 50);
            $table->string('customer_phone', 14);
            $table->string('customer_email', 50);
            $table->string('payment_method', 20);
            $table->integer('total');
            $table->string('order_date', 50);
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
        Schema::dropIfExists('orders');
    }
}
