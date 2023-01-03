<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_bookings', function (Blueprint $table) {
            $table->id();
            $table->date('sale_date')->nullable();
            $table->integer('invoice_no')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('salesman_id')->nullable();
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
        Schema::dropIfExists('sale_bookings');
    }
}
