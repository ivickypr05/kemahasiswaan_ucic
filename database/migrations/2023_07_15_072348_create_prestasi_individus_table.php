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
        Schema::create('prestasi_individus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_prestasi');
            $table->string('nama_peserta');
            $table->string('tingkat_kejuaraan');
            $table->string('gambar_1')->nullable();
            $table->string('gambar_2')->nullable();
            $table->string('gambar_3')->nullable();
            $table->string('deskripsi');
            $table->string('tanggal');
            $table->foreignId('categoryprestasi_id');
            $table->foreign('categoryprestasi_id')->references('id')->on('category_prestasis');
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
        Schema::dropIfExists('prestasi_individus');
    }
};
