<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('branch_code')->nullable();
            $table->tinyInteger('isActive')->default('0');
            $table->timestamps();
            // $table->string('address')->nullable();
            //  $table->string('fax')->nullable();
            // $table->string('email')->nullable();
            // $table->date('last_modification_date')->nullable();
        $table->integer('company_id')->unsigned()->index()->nullable();
        // $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');

            //  $table->integer('city_id')->unsigned()->index()->nullable();//f.k
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
        Schema::dropIfExists('branches');
    }
}
