<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisiLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi_laporans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('laporan_id')->unsigned();
            $table->text('revisi');
            $table->timestamps();
            $table->foreign('laporan_id')->references('id')->on('pengajuan_laporans')
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
        Schema::dropIfExists('revisi_laporans');
    }
}
