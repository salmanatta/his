<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->string("item"); 
            $table->text("qty"); 
            $table->text("price"); 
            $table->text("discount");
            $table->text("after_discount");
            $table->integer("purchase_invoice_detail_id")->unsigned();
            $table->text("bonus");
            $table->text("line_total");
            $table->integer('branch_id')->unsigned()->index()->nullable();
             $table->integer('product_id')->unsigned()->index()->nullable();
                    // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('purchase_invoice_details');
    }
}
