<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('genral_name')->nullable();
            $table->integer('product_code')->nullable(); 
            $table->integer('product_id')->unsigned()->index()->nullable();
            // $table->integer('type_id')->unsigned()->index()->nullable();//f.k
            $table->integer('type_id')->unsigned()->index()->nullable();
                // $table->foreign('type_id')->references('id')->on('product_types')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('category_id')->unsigned()->index()->nullable();//f.k
            // $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('packet')->nullable();
            $table->string('sale_price')->nullable();
            $table->integer('group_id')->unsigned()->index()->nullable();//f.k
            // $table->foreign('group_id')->references('id')->on('product_gruops')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('comp_artd_no')->nullable();//f.k
            $table->integer('group_seq')->nullable();//f.k
            $table->integer('comp_seq')->nullable();//f.k
            $table->string('weight')->nullable();
            $table->tinyInteger('isAtive')->default('0');
            $table->float('max_sale_disc')->nullable();
            $table->float('purchase_price')->nullable();
            $table->float('purchase_tax_type')->nullable();
            $table->float('purchase_tax_value')->nullable();
            $table->float('sale_tax_value')->nullable();
            $table->integer('re_order_level')->nullable();
            $table->string('prod_shel_life_day')->nullable();
            $table->float('trade_price')->nullable();
            $table->float('purchase_disc_value')->nullable();
            $table->float('tax3_value')->nullable();
             $table->float('purchase_discount')->nullable();
            $table->float('purchase_rate')->nullable();
            $table->float('purchase_tax')->nullable();
            $table->string('inventory_day')->nullable();
            $table->float('tax3_type')->nullable();
            $table->float('advance_tax_type')->nullable();
            $table->string('expire_day')->nullable();
            $table->float('net_balance')->nullable();
            $table->float('max_flat_rate')->nullable();
            $table->float('min_flat_rate')->nullable();
            $table->float('adv_tax_filer')->nullable();
            $table->float('adv_tax_non_filer')->nullable();
            $table->float('adv_tax_supplier')->nullable();
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
        Schema::dropIfExists('products');
    }
}
