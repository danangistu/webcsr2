<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAnggaranInPengobatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kesehatan_pengobatans', function (Blueprint $table) {
            $table->bigInteger('anggaran')->default(0)->after('obat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kesehatan_pengobatans', function (Blueprint $table) {
            $table->dropColumn('anggaran');
        });
    }
}
