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
        Schema::create('kelulusans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->enum('bebas_perpus', ['ya','tidak'])->default('ya');
            $table->enum('akademik', ['ya','tidak'])->default('ya');
            $table->enum('administrasi', ['ya','tidak'])->default('ya');
            $table->enum('keterangan', ['lulus','tidak_lulus'])->default('lulus');
            $table->boolean('viewed')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelulusans');
    }
};
