<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    /**
     * Menampilkan campaign unggulan di halaman beranda.
     */
    public function home()
    {
        // Ambil 4 campaign terbaru yang statusnya aktif
        $campaigns = Campaign::where('status', 'aktif')
                             ->latest()
                             ->take(4)
                             ->get();
        
        // Kirim data ke view 'home'
        return view('home', ['campaigns' => $campaigns]);
    }

    /**
     * Menampilkan semua campaign di halaman donasi dengan pagination.
     */
    public function index()
    {
        // Ambil semua campaign yang statusnya aktif, dengan 12 campaign per halaman
        $campaigns = Campaign::where('status', 'aktif')
                              ->latest()
                              ->paginate(12);

        // Kirim data ke view 'donate' (atau nama file halaman list donasi Anda)
        return view('donate', ['campaigns' => $campaigns]);
    }
}