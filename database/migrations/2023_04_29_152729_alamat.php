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
        Schema::create('alamat', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kota_id');
            $table->unsignedBigInteger('distrik_id');
            $table->unsignedBigInteger('desa_id');
            $table->timestamps();

            $table->foreign('kota_id')
                  ->references('id')
                  ->on(config('laravolt.indonesia.table_prefix').'cities')
                  ->onUpdate('no action')->onDelete('no action');

            $table->foreign('distrik_id')
                  ->references('id')
                  ->on(config('laravolt.indonesia.table_prefix').'districts')
                  ->onUpdate('no action')->onDelete('no action');

            $table->foreign('desa_id')
                  ->references('id')
                  ->on(config('laravolt.indonesia.table_prefix').'villages')
                  ->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat');
    }
};
