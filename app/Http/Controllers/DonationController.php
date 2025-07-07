<?php
// File: app/Http/Controllers/DonationController.php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DonationController extends Controller
{
    /**
     * Menampilkan formulir donasi untuk campaign tertentu.
     */
    public function create(Request $request)
    {
        // Ambil ID campaign dari URL (?campaign_id=...)
        $campaignId = $request->input('campaign_id');
        
        // Cari campaign atau tampilkan error jika tidak ditemukan
        $campaign = Campaign::findOrFail($campaignId);

        return view('formdonasi', ['campaign' => $campaign]);
    }

    /**
     * Menyimpan data donasi baru ke database.
     */
    public function store(Request $request, Campaign $campaign)
    {
        // 1. Validasi data dari form
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'jumlah' => 'required|numeric|min:5000',
            'nama_donatur' => 'required_unless:is_anonymous,on|string|max:255',
            'kontak_donatur' => 'nullable|string|max:255',
            'pesan_dukungan' => 'nullable|string|max:500',
            'metode_pembayaran' => 'required|string',
        ]);

        // 2. Siapkan data untuk disimpan
        $donorName = $request->has('is_anonymous') ? 'Donatur Anonim' : $validated['nama_donatur'];

        // 3. Simpan donasi ke database
        Donation::create([
            'user_id' => Auth::id(), // Akan null jika donatur tidak login
            'campaign_id' => $validated['campaign_id'],
            'jumlah' => $validated['jumlah'],
            'nama_donatur' => $donorName,
            'pesan_dukungan' => $validated['pesan_dukungan'],
            'status' => 'pending', // Status awal, nanti bisa diupdate oleh payment gateway
            // 'metode_pembayaran' => $validated['metode_pembayaran'], // Anda bisa menambahkan kolom ini jika perlu
        ]);

        // Di dunia nyata, di sini Anda akan mengarahkan ke payment gateway.
        // Untuk sekarang, kita langsung update dana terkumpul dan arahkan ke halaman terima kasih.
        $campaign = Campaign::findOrFail($validated['campaign_id']);
        $campaign->increment('dana_terkumpul', $validated['jumlah']);

        return redirect()->route('donations.thankyou');
    }

    /**
     * Menampilkan halaman terima kasih.
     */
    public function thankYou()
    {
        return view('donation_thankyou');
    }
}