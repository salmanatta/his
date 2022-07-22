<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_transfers', function (Blueprint $table) {
            $table->increments('id');
             $table->integer("quantity");   
             $table->float('price')->nullable();         
             $table->integer('product_id')->unsigned()->index()->nullable();
                // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
                 $table->integer('from_branch_id')->unsigned()->index()->nullable();
                // $table->foreign('from_branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
                $table->integer('to_branch_id')->unsigned()->index()->nullable();
                // $table->foreign('to_branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');          
             $table->dateTime('expire_date')->nullable();
              $table->text("description")->nullable(); 
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
        Schema::dropIfExists('store_transfers');
    }
}
