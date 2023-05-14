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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reservasi_armada_bus_id');
            $table->timestamps();

            $table->foreign('reservasi_armada_bus_id')->references('id')->on('reservasi_armada_bus')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
