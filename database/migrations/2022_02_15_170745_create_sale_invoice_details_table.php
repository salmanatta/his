<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoice_details', function (Blueprint $table) {
                $table->increments('id');
                $table->string("item");
                $table->integer("qty");
                $table->integer("price");
                $table->integer("discount");
                $table->integer("after_discount");
                $table->integer('product_id')->unsigned()->index()->nullable();
                    // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
                $table->integer('sale_invoice_id')->unsigned()->index()->nullable();
                // $table->foreign('sale_invoice_id')->references('id')->on('sale_invoices')->onDelete('cascade')->onUpdate('cascade');
                $table->integer("bonus");
                $table->integer("line_total");
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
        Schema::dropIfExists('sale_invoice_details');
    }
}
