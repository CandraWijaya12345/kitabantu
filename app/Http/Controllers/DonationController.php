<?php
// File: app/Http/Controllers/DonationController.php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // <-- Tambahkan ini untuk logging
use Midtrans\Snap;

class DonationController extends Controller
{
    public function create(Request $request)
    {
        $campaignId = $request->input('campaign_id');
        $campaign = Campaign::findOrFail($campaignId);
        return view('formdonasi', compact('campaign'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'jumlah' => 'required|numeric|min:10000',
            'nama_donatur' => 'required_unless:is_anonymous,on|string|max:255',
            'kontak_donatur' => 'nullable|string|max:255',
            'pesan_dukungan' => 'nullable|string|max:500',
        ]);

        $donation = Donation::create([
            'user_id' => Auth::id(),
            'campaign_id' => $validated['campaign_id'],
            'jumlah' => $validated['jumlah'],
            'nama_donatur' => $request->has('is_anonymous') ? 'Donatur Anonim' : $validated['nama_donatur'],
            'pesan_dukungan' => $validated['pesan_dukungan'] ?? null,
            'status' => 'unpaid',
        ]);

        // Buat order_id unik
        $orderId = 'DONASI-' . $donation->id . '-' . time();

        // Simpan order_id ke dalam record donasi di database
        $donation->order_id = $orderId;
        $donation->save();

        // Log untuk memastikan order_id benar-benar tersimpan
        Log::info('Donation created and order_id saved.', ['donation_id' => $donation->id, 'order_id' => $donation->order_id]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $donation->jumlah,
            ],
            'customer_details' => [
                'first_name' => $donation->nama_donatur,
                'email' => Auth::user()->email ?? 'donatur@example.com',
                'phone' => $validated['kontak_donatur'] ?? '08123456789',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return view('donation_payment', compact('snapToken', 'donation'));
        } catch (\Exception $e) {
            Log::error('Midtrans Snap Token Error: ' . $e->getMessage());
            return back()->with('error', 'Gagal memulai pembayaran. Silakan coba lagi.');
        }
    }
}