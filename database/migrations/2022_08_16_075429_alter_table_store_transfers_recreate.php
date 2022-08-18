<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableStoreTransfersRecreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('store_transfers');
        Schema::create('store_transfers', function (Blueprint $table) {
            $table->id();
            $table->integer('trans_id')->nullable();
            $table->date('trans_date')->nullable();
            $table->string('trans_status')->nullable();
            $table->integer('trans_changed_by')->nullable();
            $table->integer('to_branch_id')->nullable();
            $table->integer('from_branch_id')->nullable();
            $table->string('remarks')->nullable();
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
