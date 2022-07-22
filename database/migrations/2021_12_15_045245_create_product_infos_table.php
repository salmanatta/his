<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_infos', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('pack_in_box')->nullable();
            // $table->integer('pack_in_carton')->nullable();
            // $table->float('trade_price')->nullable();
            // $table->float('sale_price')->nullable();
            // $table->float('purchase_discount')->nullable();
            // $table->float('max_sale_disc')->nullable();
            // $table->float('sale_tax')->nullable();
            // $table->float('sale_tax_value')->nullable();
            // $table->string('inventory_day')->nullable();
            // $table->float('purchase_rate')->nullable();
            // $table->float('purchase_tax_type')->nullable();
            // $table->float('purchase_tax')->nullable();
            // $table->float('advance_tax_type')->nullable();
            // $table->string('expire_day')->nullable();
            // $table->float('net_balance')->nullable();
            // $table->float('max_flat_rate')->nullable();
            // $table->float('min_flat_rate')->nullable();
            // $table->float('adv_tax_filer')->nullable();
            // $table->float('adv_tax_non_filer')->nullable();
            // $table->float('adv_tax_supplier')->nullable();
            // $table->integer('product_id')->unsigned()->index()->nullable();
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
        Schema::dropIfExists('product_infos');
    }
}
