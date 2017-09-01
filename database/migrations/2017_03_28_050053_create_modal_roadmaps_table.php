<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModalRoadmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modal_roadmaps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modal_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->string('foto');
            $table->timestamps();
            $table->foreign('modal_id')->references('id')->on('modals')
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
        Schema::dropIfExists('modal_roadmaps');
    }
}
