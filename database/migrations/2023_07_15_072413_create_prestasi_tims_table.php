<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi_tims', function (Blueprint $table) {
            $table->id();
            $table->string('judul_prestasi');
            $table->string('nama_peserta_1');
            $table->string('nama_peserta_2');
            $table->string('nama_peserta_3')->nullable();
            $table->string('nama_peserta_4')->nullable();
            $table->string('nama_peserta_5')->nullable();
            $table->string('nama_peserta_6')->nullable();
            $table->string('nama_peserta_7')->nullable();
            $table->string('nama_peserta_8')->nullable();
            $table->string('nama_peserta_9')->nullable();
            $table->string('nama_peserta_10')->nullable();
            $table->string('nama_peserta_11')->nullable();
            $table->string('tingkat_kejuaraan');
            $table->string('gambar_1')->nullable();
            $table->string('gambar_2')->nullable();
            $table->string('gambar_3')->nullable();
            $table->string('deskripsi');
            $table->string('tanggal');
            $table->foreignId('category_prestasi_id');
            $table->foreign('category_prestasi_id')->references('id')->on('category_prestasis');
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
        Schema::dropIfExists('prestasi_tims');
    }
};
