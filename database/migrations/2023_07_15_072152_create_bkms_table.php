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
        Schema::create('bkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('gambar');
            $table->text('deskripsi');
            $table->string('mulai_tanggal');
            $table->string('akhir_tanggal');
            $table->integer('status');
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
        Schema::dropIfExists('bkms');
    }
};
