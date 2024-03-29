<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoices', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string("invoice_no")->nullable();
                    // $table->string("date");
                    $table->date('invoice_date')->nullable();
                    $table->text("description")->nullable();
                    $table->double("sub_total")->nullable();
                    $table->double("total")->nullable();
                    //  $table->integer('product_id')->unsigned()->index()->nullable();
                    // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
                    
                    $table->integer('user_id')->unsigned()->index()->nullable();
                    // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                    $table->integer('customer_id')->unsigned()->index()->nullable();
                    // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
                    $table->integer('branch_id')->unsigned()->index()->nullable();
                    // $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sale_invoices');
    }
}
