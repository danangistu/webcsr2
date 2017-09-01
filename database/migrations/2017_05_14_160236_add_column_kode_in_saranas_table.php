<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnKodeInSaranasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saranas', function (Blueprint $table) {
            $table->string('kode')->nullable()->after('doc_absensi');
            $table->bigInteger('anggaran')->default(0)->after('kode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saranas', function (Blueprint $table) {
            //
        });
    }
}
