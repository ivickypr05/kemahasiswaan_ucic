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
        Schema::create('pkms', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('gambar');
            $table->string('pedoman');
            $table->text('deskripsi');
            $table->string('mulai_tanggal');
            $table->string('akhir_tanggal');
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
        Schema::dropIfExists('pkms');
    }
};
