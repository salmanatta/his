<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
           $table->increments('id');
            $table->string('name');
            $table->string('region_code')->nullable();
            $table->integer('region_id')->unsigned()->index()->nullable();
               // $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('isActive')->default('0');
            $table->integer('city_id')->unsigned()->index();
            // $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            // $table->string('short_name')->nullable();
            // $table->date('last_modification_date')->nullable();
            // $table->integer('emp_id')->unsigned()->index()->nullable();//f.k
            // $table->integer('branch_id')->unsigned()->index()->nullable();//f.k
            //  $table->tinyInteger('status')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
