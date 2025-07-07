<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Withdrawal;


class WithdrawalController extends Controller
{
    public function store(Request $request, $campaignId)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:10000',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'rekening_tujuan' => 'required|string|max:100',
        ]);


        $campaign = Campaign::findOrFail($campaignId);

        // Optional: validasi saldo mencukupi
        if ($request->jumlah > $campaign->dana_terkumpul) {
            return back()->with('error', 'Saldo campaign tidak mencukupi untuk penarikan.');
        }

        Withdrawal::create([
            'campaign_id' => $campaignId,
            'jumlah' => $request->jumlah,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'rekening_tujuan' => $request->rekening_tujuan,
            'status' => 'pending',
        ]);


        return redirect()->back()->with('success', 'Permintaan penarikan dana berhasil diajukan.');
    }

}
