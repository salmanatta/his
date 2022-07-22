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
                    $table->string("invoice_no");
                    // $table->string("date");
                    $table->date('date')->nullable();
                    $table->text("description");
                    $table->integer("sub_total");
                    $table->integer("total");
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
