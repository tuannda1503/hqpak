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
            $table->string('customerName')->require();
            $table->string('phone')->nullable();
            $table->timestamp('orderAt')->nullable();
            $table->timestamp('deliveryDate')->nullable();
            $table->string('productName');
            $table->boolean('getItNow')->default(false);
            $table->integer('amount');
            $table->string('email')->nullable();
            $table->string('zalo')->nullable();
            $table->string('quoteWith')->default(0); //0: email, 1: zalo
            $table->integer('width');
            $table->integer('height');
            $table->string('material');
            $table->string('payment');
            $table->text('note');
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
};
