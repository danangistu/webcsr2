<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStatusInRevisiLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('revisi_laporans', function (Blueprint $table) {
          $table->enum('status',['not_fixed','fixed'])->default('not_fixed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('revisi_laporans', function (Blueprint $table) {
          $table->dropColumn('status');
        });
    }
}
