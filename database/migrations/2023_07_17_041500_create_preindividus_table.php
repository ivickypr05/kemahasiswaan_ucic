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
        Schema::create('preindividus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('nama');
            $table->string('tingkat_kejuaraan');
            $table->string('gambar_1');
            $table->string('gambar_2')->nullable();
            $table->string('gambar_3')->nullable();
            $table->string('deskripsi');
            $table->string('tanggal');
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('preindividus');
    }
};
