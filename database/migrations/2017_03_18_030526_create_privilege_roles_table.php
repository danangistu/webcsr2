<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegeRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilege_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('privilege_id')->unsigned();
            $table->integer('menu_id')->unsigned();
            $table->enum('is_visible',[1,0])->default(1);
            $table->enum('is_create',[1,0])->default(1);
            $table->enum('is_view',[1,0])->default(1);
            $table->enum('is_edit',[1,0])->default(1);
            $table->enum('is_delete',[1,0])->default(1);
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
        Schema::dropIfExists('privilege_roles');
    }
}
