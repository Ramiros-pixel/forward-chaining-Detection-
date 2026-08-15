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
        Schema::create('hasil_diagnosa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->json('gejala_dipilih')->comment('Array kode gejala dan keluhan yang dipilih user');
            $table->json('penyakit_terdeteksi')->comment('Array nama penyakit hasil diagnosa');
            $table->json('fired_rules')->comment('Array kode rule yang terpenuhi');
            $table->json('working_memory')->comment('Array kode fakta akhir dalam working memory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_diagnosa');
    }
};
