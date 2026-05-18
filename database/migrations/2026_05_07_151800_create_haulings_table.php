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
        Schema::create('haulings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained();
            $table->foreignId('karyawan_id')->constrained();
            $table->string('no_tiket')->nullable();
            $table->date('tanggal');
            $table->time('jam_berangkat')->nullable();
            $table->string('jam_tiba')->nullable();
            $table->string('pit')->nullable();
            $table->integer('bruto')->nullable();
            $table->integer('tara')->nullable();
            $table->integer('netto')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('haulings');
    }
};
