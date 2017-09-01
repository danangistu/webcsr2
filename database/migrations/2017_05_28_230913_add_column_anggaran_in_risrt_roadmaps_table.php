<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAnggaranInRisrtRoadmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('riset_roadmaps', function (Blueprint $table) {
          $table->bigInteger('anggaran')->default(0)->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riset_roadmaps', function (Blueprint $table) {
            $table->dropColumn('riset_roadmaps');
        });
    }
}
