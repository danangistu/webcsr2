<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPrivilegeRolesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('privilege_roles');
        Schema::create('privilege_roles', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('privilege_id')->unsigned();
          $table->enum('pelayanan',[1,0])->default(0);
          $table->enum('pembinaan',[1,0])->default(0);
          $table->enum('pemberdayaan',[1,0])->default(0);
          $table->enum('regulasi',[1,0])->default(0);
          $table->enum('quick',[1,0])->default(0);
          $table->enum('pendanaan',[1,0])->default(0);
          $table->enum('privilege',[1,0])->default(0);
          $table->enum('setting',[1,0])->default(0);
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
