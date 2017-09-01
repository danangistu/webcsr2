<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKesehatanPengobatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kesehatan_pengobatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kesehatan_id')->unsigned();
            $table->string('penyakit');
            $table->string('obat');
            $table->timestamps();
            $table->foreign('kesehatan_id')->references('id')->on('kesehatans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kesehatan_pengobatans');
    }
}
