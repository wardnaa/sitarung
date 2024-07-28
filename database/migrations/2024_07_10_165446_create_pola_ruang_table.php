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
        Schema::create('polaruang', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent')->nullable();
            $table->string('nama');
            $table->string('deskripsi')->nullable();
            $table->string('jsonfile')->nullable();
            // Add isactive column 0 / 1
            $table->boolean('header')->default(1);
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pola_ruang');
    }
};
