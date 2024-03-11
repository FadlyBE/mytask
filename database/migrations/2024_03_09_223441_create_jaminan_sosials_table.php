<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJaminanSosialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_jaminan_sosial', function (Blueprint $table) {
            $table->id();
            $table->integer('pegawai_id');
            $table->boolean('asuransi_pa');
            $table->boolean('bpjs_kesehatan');
            $table->boolean('bpjs_tk');
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
        Schema::dropIfExists('jaminan_sosials');
    }
}
