<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInPendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendidikans', function (Blueprint $table) {
          $table->string('kode')->nullable()->after('doc_evaluasi');
          $table->bigInteger('anggaran')->default(0)->after('kode');
          $table->string('tahun')->after('anggaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendidikans', function (Blueprint $table) {
          $table->dropcolumn('kode');
          $table->dropcolumn('anggaran');
          $table->dropcolumn('tahun');
        });
    }
}
