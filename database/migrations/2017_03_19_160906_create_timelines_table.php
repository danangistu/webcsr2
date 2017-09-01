<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->increments('id');
            $table->text('jan');
            $table->text('feb');
            $table->text('mar');
            $table->text('apr');
            $table->text('mei');
            $table->text('jun');
            $table->text('jul');
            $table->text('agu');
            $table->text('sep');
            $table->text('okt');
            $table->text('nov');
            $table->text('des');
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
        Schema::dropIfExists('timelines');
    }
}
