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
        Schema::create('help_requests', function (Blueprint $table) {
            $table->id();

            // Menghubungkan ke user yang membuat permintaan
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('kategori');
            $table->text('detail_pertolongan');
            $table->date('tanggal_pertolongan');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('lokasi');
            $table->string('nama_pemohon'); // Nama sesuai KTP
            $table->string('kontak_pemohon')->nullable(); // Opsional
            $table->string('status')->default('pending'); // Status awal: pending, approved, etc.

            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('help_requests');
    }
};
