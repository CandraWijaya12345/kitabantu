<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // File: database/migrations/xxxx_xx_xx_xxxxxx_create_user_details_table.php
    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();

            // Foreign key yang terhubung ke tabel users
            // unique() memastikan relasi one-to-one
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');

            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('nomor_hp')->nullable();
            $table->text('alamat')->nullable();
            $table->text('bio')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
