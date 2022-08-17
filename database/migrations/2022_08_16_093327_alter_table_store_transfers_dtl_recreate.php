<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableStoreTransfersDtlRecreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('store_transfer_details');
        Schema::create('store_transfer_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trans_id')->unsigned()->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('qty')->nullable();
            $table->double('price')->nullable();
            $table->double('line_total')->nullable();
            $table->integer('batch_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
