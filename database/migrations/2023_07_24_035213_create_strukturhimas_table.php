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
        Schema::create('strukturhimas', function (Blueprint $table) {
            $table->id();
            $table->string('struktur_himatif')->nullable();
            $table->string('struktur_himasi')->nullable();
            $table->string('struktur_himadkv')->nullable();
            $table->string('struktur_himaka')->nullable();
            $table->string('struktur_himaku')->nullable();
            $table->string('struktur_himajemen')->nullable();
            $table->string('struktur_himabis')->nullable();
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
        Schema::dropIfExists('strukturhimas');
    }
};
