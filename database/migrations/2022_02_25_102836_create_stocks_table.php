<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
             $table->integer("quantity");   
             $table->float('price')->nullable();           
             $table->integer('batch_id')->unsigned()->index()->nullable();
                // $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('product_id')->unsigned()->index()->nullable();
                // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
                 $table->integer('branch_id')->unsigned()->index()->nullable();
                // $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');          
             $table->dateTime('expire_date')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
