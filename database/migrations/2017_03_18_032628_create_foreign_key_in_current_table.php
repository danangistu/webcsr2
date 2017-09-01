<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyInCurrentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('privilege_id')->references('id')->on('privileges')
                ->onUpdate('restrict')
                ->onDelete('cascade');
        });
        Schema::table('privilege_roles', function (Blueprint $table) {
            $table->foreign('privilege_id')->references('id')->on('privileges')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('menus', function (Blueprint $table) {
            $table->foreign('privilege_id')->references('id')->on('privileges')
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
        
    }
}
