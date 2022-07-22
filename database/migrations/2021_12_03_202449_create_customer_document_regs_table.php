<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDocumentRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_document_regs', function (Blueprint $table) {
               $table->increments('id');
            $table->string('cnic')->nullable();
            $table->string('ntn')->nullable();
            $table->string('sntn')->nullable();
            $table->string('exemption')->nullable();
            $table->string('filer')->nullable();
            $table->integer('status')->nullable();
            $table->string('certificate')->nullable();
            $table->integer('customer_id')->unsigned()->index()->nullable();
                // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('customer_document_regs');
    }
}
