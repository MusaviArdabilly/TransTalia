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
        Schema::create('perawatan_armada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('armada_bus_id');
            $table->unsignedBigInteger('kode_perawatan_id');
            $table->timestamps();

            $table->foreign('armada_bus_id')
                  ->references('id')->on('armada_bus')
                  ->onDelete('no action')->onUpdate('cascade');
            $table->foreign('kode_perawatan_id')
                  ->references('id')->on('kode_perawatan')
                  ->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perawatan_armada');
    }
};
