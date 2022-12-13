<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTargetDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_target_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sales_target_id')->nullable()->unsigned();
            $table->integer('product_id')->nullable()->unsigned();
            $table->integer('target_qty')->unsigned()->nullable();
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
        Schema::dropIfExists('sales_target_details');
    }
}
