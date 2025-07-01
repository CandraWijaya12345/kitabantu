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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users'); // Nullable jika donasi anonim
            $table->foreignId('campaign_id')->constrained('campaigns');
            $table->unsignedBigInteger('jumlah');
            $table->text('pesan_dukungan')->nullable();
            $table->string('status')->default('pending'); // pending, success, failed
            $table->string('nama_donatur'); // Untuk menyimpan nama, bahkan jika anonim
            $table->timestamps();
        });
    }
};
