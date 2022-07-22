<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_licenses', function (Blueprint $table) {
              $table->increments('id');
              $table->string('license_name')->nullable();
              $table->string('document')->nullable();
              $table->date('exp_date')->nullable();
              $table->integer('license_type_id')->unsigned()->index()->nullable();//f.k
              $table->integer('customer_id')->unsigned()->index()->nullable();//f.k
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
        Schema::dropIfExists('customer_licenses');
    }
}
