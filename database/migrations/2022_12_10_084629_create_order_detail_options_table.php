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
        Schema::create('order_detail_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_size_option_id');
            $table->unsignedBigInteger('order_detail_id');
            $table->foreign('order_detail_id')->references('id')->on('order_details')->onDelete('cascade');
            $table->foreign('product_size_option_id')->references('id')->on('product_size_options')->onDelete('cascade');
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
        Schema::dropIfExists('order_detail_options');
    }
};
