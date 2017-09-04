<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePengajuanLaporans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuan_laporans', function (Blueprint $table) {
            $table->dropColumn('laporan');
        });
        Schema::table('pengajuan_laporans', function (Blueprint $table) {
            $table->text('dmr_cover')->after('type');
            $table->text('dmr_bab_1')->after('dmr_cover');
            $table->text('dmr_bab_2')->after('dmr_bab_1');
            $table->text('dmr_bab_3')->after('dmr_bab_2');
            $table->text('dmr_bab_4')->after('dmr_bab_3');
            $table->text('tor_cover')->after('dmr_bab_4');
            $table->text('tor_bab_1')->after('tor_cover');
            $table->text('tor_bab_2')->after('tor_bab_1');
            $table->text('tor_bab_3')->after('tor_bab_2');
            $table->text('tor_bab_4')->after('tor_bab_3');
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
            $table->dropColumn('dmr_cover');
            $table->dropColumn('dmr_bab_1');
            $table->dropColumn('dmr_bab_2');
            $table->dropColumn('dmr_bab_3');
            $table->dropColumn('dmr_bab_4');
            $table->dropColumn('tor_cover');
            $table->dropColumn('tor_bab_1');
            $table->dropColumn('tor_bab_2');
            $table->dropColumn('tor_bab_3');
            $table->dropColumn('tor_bab_4');
        });
    }
}
