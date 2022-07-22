<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('designation_id')->unsigned()->index()->nullable();//f.k
            // $table->integer('distb_id')->unsigned()->index()->nullable();//f.k
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_off')->nullable();
            $table->string('phone_res')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->integer('city_id')->unsigned()->index()->nullable();//f.k
            $table->string('postal_code')->nullable();
            $table->string('cnic_no')->nullable();
             $table->string('emg_name')->nullable();
             $table->string('emg_phone')->nullable();
              $table->date('hire_date')->nullable();
               $table->date('leave_date')->nullable();
            $table->float('basic_salery')->nullable();
            $table->tinyInteger('isAtive')->default('0');
            $table->date('last_modification_date')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
