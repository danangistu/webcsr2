<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quicks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tw1_performance');
            $table->text('tw1_process');
            $table->text('tw1_people');
            $table->text('tw2_performance');
            $table->text('tw2_process');
            $table->text('tw2_people');
            $table->text('tw3_performance');
            $table->text('tw3_process');
            $table->text('tw3_people');
            $table->text('tw4_performance');
            $table->text('tw4_process');
            $table->text('tw4_people');
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
        Schema::dropIfExists('quicks');
    }
}
