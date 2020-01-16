<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoursDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hours_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('hour');
            $table->unsignedBigInteger('day_id');
            $table->foreign('day_id')->references('id')
                ->on('days')
                ->onDelete('cascade');
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
        Schema::dropIfExists('hours_days');
    }
}
