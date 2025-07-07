<?php
// File: app/Http/Controllers/MidtransCallbackController.php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Berguna untuk melihat log jika terjadi masalah

class MidtransCallbackController extends Controller
{
    /**
     * Menangani notifikasi pembayaran dari Midtrans.
     */
    public function handle(Request $request)
    {
        // 1. Ambil server key dari konfigurasi Anda
        $serverKey = config('midtrans.server_key');

        // 2. Buat signature key untuk verifikasi keamanan
        $signatureKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        // 3. Validasi signature (PENTING!)
        if ($signatureKey != $request->signature_key) {
            // Log jika signature tidak valid untuk keamanan
            Log::warning('Midtrans callback: Invalid signature.', ['request' => $request->all()]);
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // 4. Cari donasi berdasarkan order_id
        // Contoh: 'DONASI-123-1678886400' -> kita ambil '123'
        $donationId = explode('-', $request->order_id)[1] ?? null;
        $donation = Donation::find($donationId);

        if (!$donation) {
            Log::error('Midtrans callback: Donation not found.', ['order_id' => $request->order_id]);
            return response()->json(['message' => 'Donation not found'], 404);
        }

        // 5. Update status donasi berdasarkan status transaksi dari Midtrans
        $transactionStatus = $request->transaction_status;
        
        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            // Jika pembayaran berhasil
            if ($donation->status == 'unpaid') {
                $donation->update(['status' => 'success']);
                // Tambahkan dana terkumpul ke campaign terkait
                $donation->campaign->increment('dana_terkumpul', $donation->jumlah);
            }
        } else if ($transactionStatus == 'pending') {
            // Jika pembayaran tertunda
            $donation->update(['status' => 'pending']);
        } else {
            // Untuk status 'deny', 'expire', 'cancel'
            $donation->update(['status' => 'failed']);
        }
        
        return response()->json(['message' => 'Notification handled successfully.']);
    }
}
