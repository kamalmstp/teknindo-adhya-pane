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
        Schema::table('haulings', function (Blueprint $table) {
                $table->decimal('bruto', 15, 3)->change();
                $table->decimal('tara', 15, 3)->change();
                $table->decimal('netto', 15, 3)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('haulings', function (Blueprint $table) {
                $table->integer('bruto')->change();
                $table->integer('tara')->change();
                $table->integer('netto')->change();
        });
    }
};
