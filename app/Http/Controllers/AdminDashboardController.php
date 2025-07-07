<?php
// File: app/Http/Controllers/AdminDashboardController.php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // <-- TAMBAHKAN INI
use Carbon\CarbonPeriod; // <-- TAMBAHKAN INI // Jangan lupa tambahkan ini

class AdminDashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan data ringkasan.
     */
    public function index()
    {
        // 1. Total Campaign yang statusnya 'aktif'
        $total_active_campaigns = Campaign::where('status', 'aktif')->count();

        // 2. Total Donasi yang masuk hari ini (asumsi status 'success')
        $donations_today_count = Donation::where('status', 'success')->whereDate('created_at', today())->count();

        // 3. Total Dana Terkumpul dari semua donasi yang sukses
        $total_funds_raised = Donation::where('status', 'success')->sum('jumlah');

        // 4. Jumlah User baru yang terdaftar hari ini
        $new_users_today_count = User::whereDate('created_at', today())->count();

        // 5. Daftar 5 Campaign baru yang butuh review (status 'pending')
        $pending_campaigns = Campaign::where('status', 'pending')->latest()->take(5)->get();

                // --- LOGIKA BARU UNTUK DATA GRAFIK ---
        $startDate = now()->subDays(6);
        $endDate = now();
        $period = CarbonPeriod::create($startDate, $endDate);

                // 1. Ambil data campaign dari database, kelompokkan per tanggal
        $campaignCounts = Campaign::where('created_at', '>=', $startDate)
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->pluck('count', 'date');

                    // 2. Siapkan array untuk label (tanggal) dan data (jumlah)
        $chartLabels = [];
        $chartData = [];

                // 3. Loop melalui 7 hari terakhir untuk memastikan semua hari ada di grafik
        foreach ($period as $date) {
            $formattedDate = $date->format('d M'); // Format tanggal (e.g., "07 Jul")
            $dbDate = $date->format('Y-m-d');

            $chartLabels[] = $formattedDate;
            // Jika ada data untuk tanggal ini, gunakan. Jika tidak, nilainya 0.
            $chartData[] = $campaignCounts[$dbDate] ?? 0;
        }
        // --- AKHIR LOGIKA GRAFIK ---
        // Kirim semua data yang sudah diambil ke view 'dashboard'
        return view('dashboard', compact(
            'total_active_campaigns',
            'donations_today_count',
            'total_funds_raised',
            'new_users_today_count',
            'pending_campaigns',
            'chartLabels', // Data label untuk grafik
            'chartData'   // Data jumlah untuk grafik
        ));
    }
}