<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('customer_code')->nullable();
            $table->string('customer_old_code')->nullable();
            // $table->string('first_name')->nullable();
            // $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_off')->nullable();
            $table->string('phone_res')->nullable();
             $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('cnic_no')->nullable();
             $table->string('license_type')->nullable();//f.k
            $table->tinyInteger('isAtive')->default('0');
            $table->tinyInteger('flag')->default('0');
            // $table->string('gst_registration')->nullable();
            $table->string('license_name')->nullable();
            $table->date('exp_date')->nullable();
            $table->string('customer_rating')->nullable();
            $table->integer('group_id')->unsigned()->index()->nullable();
                // $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('city_id')->unsigned()->index()->nullable();
                // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('region_id')->unsigned()->index()->nullable();
                // $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('customers');
    }
}
