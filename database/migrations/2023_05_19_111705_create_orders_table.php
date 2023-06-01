<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('table_id')->nullable();
            $table->bigInteger('quantity');
            $table->bigInteger('pay_amount');
            $table->string('status');
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('cash_flow_id')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('cash_flow_id')->references('id')->on('cash_flows')->onDelete('cascade');
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
};
