<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProductBonusRecreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {                        
        Schema::create('product_bonuses', function (Blueprint $table) {
            $table->id;
            $table->unsignedBigInteger('bouns_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();   
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->integer('active_flog')->default(1);
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
        Schema::dropIfExists('product_bonuses');
    }
}





