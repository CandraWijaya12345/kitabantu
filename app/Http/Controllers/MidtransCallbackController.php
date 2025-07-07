<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
    Log::info('✅ Callback Midtrans berhasil masuk.', $request->all());

        // Validasi Signature
        $serverKey = config('midtrans.server_key');
        $signatureKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($signatureKey !== $request->signature_key) {
            Log::warning('Midtrans callback: Invalid signature.', [
                'order_id' => $request->order_id,
                'status_code' => $request->status_code,
                'gross_amount' => $request->gross_amount,
                'calculated' => $signatureKey,
                'received' => $request->signature_key
            ]);
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Cari donasi
        $donation = Donation::where('order_id', $request->order_id)->first();
        if (!$donation) {
            Log::error('Midtrans callback: Donation not found.', ['order_id' => $request->order_id]);
            return response()->json(['message' => 'Donation not found'], 404);
        }

        // Jangan proses jika sudah paid
        if ($donation->status === 'paid') {
            Log::info('SKIPPED: Donation status was already paid.', ['donation_id' => $donation->id]);
            return response()->json(['message' => 'Notification for an already paid transaction is skipped.']);
        }

        // Siapkan data untuk update
        $updateData = [
            'payment_type' => $request->payment_type,
            'payment_response' => json_encode($request->all()),
        ];

        // Tentukan status baru
        $transactionStatus = $request->transaction_status;
        Log::info('Processing transaction status.', ['transaction_status' => $transactionStatus, 'donation_id' => $donation->id]);

        if (in_array($transactionStatus, ['capture', 'settlement', 'authorize'])) {
            $updateData['status'] = 'paid';
            try {
                $donation->campaign->increment('dana_terkumpul', $donation->jumlah);
                Log::info('SUCCESS: Donation status updated to paid.', ['donation_id' => $donation->id]);
            } catch (\Exception $e) {
                Log::error('Failed to update campaign dana_terkumpul.', ['error' => $e->getMessage(), 'donation_id' => $donation->id]);
            }
        } else if ($transactionStatus === 'pending') {
            $updateData['status'] = 'pending';
        } else {
            $updateData['status'] = 'failed';
        }

        // Update donasi
        try {
            $donation->update($updateData);
            Log::info('Donation record updated.', ['donation_id' => $donation->id, 'new_status' => $updateData['status']]);
        } catch (\Exception $e) {
            Log::error('Failed to update donation.', ['error' => $e->getMessage(), 'donation_id' => $donation->id]);
            return response()->json(['message' => 'Failed to update donation'], 500);
        }

        return response()->json(['message' => 'Notification handled successfully.']);
    }
}