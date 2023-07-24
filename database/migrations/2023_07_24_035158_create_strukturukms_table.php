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
        Schema::create('strukturukms', function (Blueprint $table) {
            $table->id();
            $table->string('struktur_esport')->nullable();
            $table->string('struktur_futsal')->nullable();
            $table->string('struktur_badminton')->nullable();
            $table->string('struktur_musik')->nullable();
            $table->string('struktur_nusantari')->nullable();
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
        Schema::dropIfExists('strukturukms');
    }
};
