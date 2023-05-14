<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('armada_bus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('gambar')->nullable();
            $table->string('kursi');
            $table->string('sassis');
            $table->string('jenis_bus');
            $table->string('warna')->nullable();
            $table->string('plat_nomor')->unique();
            $table->string('gps')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armada_bus');
    }
};
