<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePrivilegeRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('privilege_roles', function (Blueprint $table) {
          $table->enum('pengajuan',[1,0])->default(0);
          $table->enum('sps',[1,0])->default(0);
          $table->enum('gm',[1,0])->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('privilege_roles', function (Blueprint $table) {
          $table->dropColumn('pengajuan');
          $table->dropColumn('sps');
          $table->dropColumn('gm');

        });
    }
}
