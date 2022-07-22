<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('supplier_id')->nullable();
            // $table->string('contact_name')->nullable();
            // $table->string('contact_title')->nullable();
            $table->string('address')->nullable();
            $table->integer('city_id')->unsigned()->index();
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            // $table->integer('branch_id')->unsigned()->index(); for the future 
            // $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
            // $table->integer('distb_id')->unsigned()->index()->nullable();//f.k
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('url')->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('isActive')->default('0');
            $table->integer('group_id')->unsigned()->index()->nullable();
                // $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
            // $table->date('last_modification_date')->nullable();
             // $table->integer('employee_id')->unsigned()->index()->nullable();//f.k

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
        Schema::dropIfExists('suppliers');
    }
}
