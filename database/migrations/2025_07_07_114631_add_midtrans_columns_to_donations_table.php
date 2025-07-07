<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->string('order_id')->nullable()->unique()->after('id'); // Untuk menyimpan order_id unik dari Midtrans
            $table->text('payment_response')->nullable()->after('status'); // Untuk menyimpan respons JSON dari Midtrans
            $table->string('payment_type')->nullable()->after('status'); // Untuk menyimpan tipe pembayaran (misalnya: credit_card, gopay)
        });
    }

    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn(['order_id', 'payment_response', 'payment_type']);
        });
    }
};