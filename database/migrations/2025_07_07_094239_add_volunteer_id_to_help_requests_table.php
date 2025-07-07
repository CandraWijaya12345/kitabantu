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
        Schema::table('help_requests', function (Blueprint $table) {
            // Menambahkan kolom 'volunteer_id' yang terhubung ke tabel 'users'
            // Kolom ini boleh kosong (nullable) dan akan menjadi null jika user volunteer dihapus.
            $table->foreignId('volunteer_id')->nullable()->after('status')
                  ->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('help_requests', function (Blueprint $table) {
            // Hapus foreign key constraint terlebih dahulu sebelum menghapus kolom
            $table->dropForeign(['volunteer_id']);
            $table->dropColumn('volunteer_id');
        });
    }
};