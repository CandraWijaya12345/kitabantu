<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdrawal;

class AdminWithdrawalController extends Controller
{

    public function index()
    {
        $withdrawals = Withdrawal::with('campaign.user')->latest()->get();

        return view('adminpenarikandana', compact('withdrawals'));
    }
    
    // app/Http/Controllers/AdminWithdrawalController.php
    public function approve($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $campaign = $withdrawal->campaign;

        if ($withdrawal->jumlah > $campaign->dana_terkumpul) {
            return back()->with('error', 'Dana tidak mencukupi.');
        }

        $campaign->dana_terkumpul -= $withdrawal->jumlah;
        $campaign->save();

        $withdrawal->status = 'disetujui';
        $withdrawal->save();

        return back()->with('success', 'Penarikan disetujui dan dana dikurangi.');
    }

    public function reject($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = 'ditolak';
        $withdrawal->save();

        return back()->with('success', 'Penarikan ditolak.');
    }

}
