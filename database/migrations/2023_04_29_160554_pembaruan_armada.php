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
        Schema::create('pembaruan_armada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('armada_bus_id');
            $table->string('pembaruan');
            $table->timestamps();

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
