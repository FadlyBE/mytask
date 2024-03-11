<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->string('jabatan');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('status_perkawinan');
            $table->string('no_ktp');
            $table->string('nip');
            $table->string('npwp');
            $table->string('no_paspor')->nullable();
            $table->date('tanggal_mulai_tugas');
            $table->date('tgl_spk_pertama')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email_kerja')->nullable();
            $table->string('email_pribadi')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('domisili')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('ppg_2022')->nullable();
            $table->string('sertifikasi')->nullable();
            $table->string('inpassing')->nullable();
            $table->string('photo_resmi')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
}
