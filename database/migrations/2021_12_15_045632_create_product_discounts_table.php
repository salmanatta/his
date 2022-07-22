<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->float('discount')->nullable();
            // $table->integer('quantity')->nullable();
             $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('product_id')->unsigned()->index()->nullable();
                // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
             $table->tinyInteger('isActive')->nullable();
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
        Schema::dropIfExists('product_discounts');
    }
}
