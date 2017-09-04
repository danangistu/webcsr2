<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePengajuanLaporans2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuan_laporans', function (Blueprint $table) {
            $table->dropColumn('tor_bab_1');
            $table->dropColumn('tor_bab_2');
            $table->dropColumn('tor_bab_3');
            $table->dropColumn('tor_bab_4');
        });
        Schema::table('pengajuan_laporans', function (Blueprint $table) {
            $table->text('tor_laporan')->after('tor_cover');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan_laporans', function (Blueprint $table) {
            $table->dropColumn('tor_laporan');
        });
    }
}
