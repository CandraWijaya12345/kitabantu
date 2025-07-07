<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Withdrawal;


class WithdrawalController extends Controller
{
    // app/Http/Controllers/WithdrawalController.php
    public function store(Request $request, $campaign_id)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:1',
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $campaign = Campaign::findOrFail($campaign_id);

        if ($request->jumlah > $campaign->dana_terkumpul) {
            return back()->with('error', 'Jumlah melebihi saldo tersedia');
        }

        Withdrawal::create([
            'campaign_id' => $campaign->id,
            'jumlah' => $request->jumlah,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Permintaan penarikan dana berhasil dikirim. Menunggu persetujuan admin.');
    }

}
