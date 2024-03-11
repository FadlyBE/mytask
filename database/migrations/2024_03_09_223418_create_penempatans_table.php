<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenempatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penempatan', function (Blueprint $table) {
            $table->id();
            $table->integer('pegawai_id');
            $table->string('unit_penempatan');
            $table->string('tahun_mulai');
            $table->string('status_pegawai');
            $table->date('tgl_pengangkatan');
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
        Schema::dropIfExists('penempatans');
    }
}
