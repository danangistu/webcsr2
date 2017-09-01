<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikanPenerimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_penerimas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pendidikan_id')->unsigned();
            $table->string('nama');
            $table->date('birthdate');
            $table->text('alamat');
            $table->string('pendidikan');
            $table->integer('biaya');
            $table->text('keterangan');
            $table->string('foto');
            $table->timestamps();
            $table->foreign('pendidikan_id')->references('id')->on('pendidikans')
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
        Schema::dropIfExists('pendidikan_penerimas');
    }
}
