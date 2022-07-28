<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string("invoice_no"); 
            $table->date('date')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('suplier_id')->unsigned()->nullable();
            $table->text("description")->nullable();
            $table->text("sub_total")->nullable();
            $table->text("total")->nullable();
            $table->tinyInteger('dropt')->default('0')->nullable();  
            $table->integer('branch_id')->unsigned()->index()->nullable();
            $table->integer('product_id')->unsigned()->index()->nullable();
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
        Schema::dropIfExists('purchase_invoices');
    }
}
