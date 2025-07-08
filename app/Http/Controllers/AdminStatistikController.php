<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\User;
use App\Models\Donation;
use Illuminate\Support\Facades\DB;

class AdminStatistikController extends Controller
{
    public function index()
    {
        // Total nominal donasi
        $totalPendapatan = Donation::where('status', 'paid')->sum('jumlah');

        // Total campaign berhasil
        $campaignBerhasil = Campaign::where('status', 'berhasil')->count();

        // Total user
        $totalUser = User::count();

        // Total jumlah donasi (jumlah transaksi)
        $totalTransaksi = Donation::where('status', 'paid')->count();

        // Donasi per bulan (jumlah transaksi per bulan)
        $donasiBulanan = Donation::where('status', 'paid')
            ->select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as bulan"),
                DB::raw("COUNT(*) as jumlah_transaksi")
            )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
            ->orderBy('bulan')
            ->get();

        // Distribusi jumlah campaign berdasarkan kategori
        $kategoriDistribusi = Campaign::select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->get();

        return view('adminstatistik', compact(
            'totalPendapatan',
            'campaignBerhasil',
            'totalUser',
            'totalTransaksi',
            'donasiBulanan',
            'kategoriDistribusi' // <-- penting!
        ));
    }
}
