<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    // Fungsi untuk MENAMPILKAN form donasi
    public function create(Campaign $campaign) {
        return view('formdonasi', ['campaign' => $campaign]);
    }
    // Fungsi untuk MEMPROSES donasi yang disubmit
    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'jumlah' => 'required|numeric|min:10000',
            'nama_donatur' => 'required|string|max:255',
            'pesan_dukungan' => 'nullable|string',
        ]);

        // 2. Buat catatan donasi baru di tabel 'donations'
        Donation::create([
            'campaign_id' => $validated['campaign_id'],
            'user_id' => Auth::id(), // Ambil ID user yang sedang login, bisa null jika tidak ada
            'nama_donatur' => $validated['nama_donatur'],
            'jumlah' => $validated['jumlah'],
            'pesan_dukungan' => $validated['pesan_dukungan'],
            'status' => 'success', // Kita anggap langsung sukses untuk saat ini
        ]);

        // 3. Update dana terkumpul di tabel 'campaigns'
        $campaign = Campaign::find($request->campaign_id);
        $campaign->increment('dana_terkumpul', $request->jumlah);
        return redirect()->route('donate.menu', $campaign->slug)->with('success', 'Terima kasih!');
    }
}