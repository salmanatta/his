<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->string('email')->nullable();
             $table->string('phone')->nullable();
             $table->string('fax')->nullable();
             $table->string('address')->nullable();
             $table->string('logo')->nullable();
             $table->tinyInteger('isActive')->default('0');
             $table->timestamps();
            // $table->integer('distb_id')->unsigned()->index()->nullable();//f.k
            // $table->integer('supplier_id')->unsigned()->index()->nullable();
                // $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade')->onUpdate('cascade');
             // $table->decimal('w_h_tax',10,2);
            // $table->string('short_name')->nullable();
             // $table->integer('region_id')->unsigned()->index()->nullable();
                // $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
            // $table->integer('branch_id')->unsigned()->index()->nullable();
                // $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('address')->nullable();
            // $table->integer('city_id')->unsigned()->index()->nullable();//f.k
             
            // $table->string('url')->nullable();
            // $table->text('note')->nullable();
            // $table->date('last_modification_date')->nullable();
            //  $table->integer('employee_id')->unsigned()->index()->nullable();//f.k
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
