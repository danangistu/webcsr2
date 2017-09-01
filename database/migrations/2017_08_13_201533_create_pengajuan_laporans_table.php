<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_laporans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('csr_id');
            $table->string('type');
            $table->text('laporan');
            $table->enum('approvel_sps',['pending','revisi','approve'])->default('pending');
            $table->enum('approvel_gm',['pending','revisi','approve'])->default('pending');
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
        Schema::dropIfExists('pengajuan_laporans');
    }
}
