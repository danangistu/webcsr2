<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisetRoadmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riset_roadmaps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('riset_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->string('foto');
            $table->timestamps();
            $table->foreign('riset_id')->references('id')->on('risets')
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
        Schema::dropIfExists('riset_roadmaps');
    }
}
