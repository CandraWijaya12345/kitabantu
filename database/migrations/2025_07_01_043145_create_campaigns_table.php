<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('kategori'); // Kolom kategori sudah ada di sini
            $table->text('deskripsi_singkat');
            $table->longText('deskripsi_lengkap');
            $table->unsignedBigInteger('target_dana');
            $table->unsignedBigInteger('dana_terkumpul')->default(0);
            $table->date('batas_waktu');
            $table->string('gambar_url')->nullable();
            $table->string('status')->default('pending');  // pending, aktif, selesai, ditolak
            $table->unsignedInteger('view_count')->default(0);
            $table->timestamps();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};