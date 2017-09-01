<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBencanaPemberiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bencana_pemberians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bencana_id')->unsigned();
            $table->text('description');
            $table->string('foto');
            $table->timestamps();
            $table->foreign('bencana_id')->references('id')->on('bencanas')
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
        Schema::dropIfExists('bencana_pemberians');
    }
}
