<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAnggaranInBencanaPemberiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bencana_pemberians', function (Blueprint $table) {
          $table->bigInteger('anggaran')->default(0)->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bencana_pemberians', function (Blueprint $table) {
          $table->dropColumn('anggaran');
        });
    }
}
