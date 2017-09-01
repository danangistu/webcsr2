<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaranasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saranas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('timeline_id')->unsigned();
            $table->integer('latar_belakang_id')->unsigned();
            $table->integer('evaluasi_id')->unsigned();
            $table->text('tempat');
            $table->text('kerjasama');
            $table->string('doc_kerjasama');
            $table->string('doc_anggaran');
            $table->string('doc_resiko');
            $table->string('doc_tor');
            $table->string('doc_laporan');
            $table->string('doc_evaluasi');
            $table->string('doc_absensi');
            $table->timestamps();
            $table->foreign('timeline_id')->references('id')->on('timelines')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('latar_belakang_id')->references('id')->on('latar_belakangs')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('evaluasi_id')->references('id')->on('evaluasis')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saranas');
    }
}
