<?php
// File: app/Http/Controllers/DonationController.php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap; // <-- Pastikan ini di-import

class DonationController extends Controller
{
    /**
     * Menampilkan formulir donasi.
     */
    public function create(Request $request)
    {
        $campaignId = $request->input('campaign_id');
        $campaign = Campaign::findOrFail($campaignId);
        return view('formdonasi', ['campaign' => $campaign]);
    }

    /**
     * Memproses form donasi dan meminta Snap Token ke Midtrans.
     */
    public function store(Request $request)
    {
        // 1. Validasi data dari form
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'jumlah' => 'required|numeric|min:10000', // Minimum donasi Midtrans
            'nama_donatur' => 'required_unless:is_anonymous,on|string|max:255',
            'kontak_donatur' => 'nullable|string|max:255',
            'pesan_dukungan' => 'nullable|string|max:500',
        ]);

        // 2. Buat catatan donasi di database dengan status 'unpaid'
        $donation = Donation::create([
            'user_id' => Auth::id(),
            'campaign_id' => $validated['campaign_id'],
            'jumlah' => $validated['jumlah'],
            'nama_donatur' => $request->has('is_anonymous') ? 'Donatur Anonim' : $validated['nama_donatur'],
            'pesan_dukungan' => $validated['pesan_dukungan'] ?? null,
            'status' => 'unpaid',
        ]);

        // 3. Siapkan parameter untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => 'DONASI-' . $donation->id . '-' . time(), // ID unik
                'gross_amount' => $donation->jumlah,
            ],
            'customer_details' => [
                'first_name' => $donation->nama_donatur,
                'email' => Auth::user()->email ?? 'donatur@example.com',
                'phone' => $validated['kontak_donatur'] ?? '08123456789',
            ],
        ];

        try {
            // 4. Dapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);
            
            // 5. Kirim token ke view baru yang akan menampilkan halaman pembayaran
            return view('donation_payment', [
                'snapToken' => $snapToken,
                'donation' => $donation
            ]);

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
