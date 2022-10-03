<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCalendarImplement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_implement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calendar_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->string('form_name')->nullable();
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
        Schema::dropIfExists('table_calendar_implement');
    }
}
