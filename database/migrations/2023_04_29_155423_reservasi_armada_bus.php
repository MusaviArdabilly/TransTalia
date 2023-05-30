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
        Schema::create('reservasi_armada_bus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reservasi_id');
            $table->unsignedBigInteger('armada_bus_id');
            $table->integer('sub_total');
            $table->timestamps();

            $table->foreign('reservasi_id')->references('id')->on('reservasi')->onDelete('cascade')->onUpdate('cascade'); //related records to be automatically deleted when the referenced record is deleted.
            $table->foreign('armada_bus_id')->references('id')->on('armada_bus')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
