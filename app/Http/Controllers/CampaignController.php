<?php
namespace App\Http\Controllers;
use App\Models\Campaign;
class CampaignController extends Controller
{
    // Untuk halaman / (beranda)
    public function home() {
        $campaigns = Campaign::where('status', 'aktif')->latest()->take(4)->get();
        return view('home', ['campaigns' => $campaigns]);
    }

    // Untuk halaman /donate (list semua campaign)
    public function index() {
        $campaigns = Campaign::where('status', 'aktif')->latest()->paginate(12);
        return view('donate', ['campaigns' => $campaigns]);
    }

    // Untuk halaman /donatemenu/{slug} (detail campaign)
    public function show(Campaign $campaign) {
        return view('donatemenu', ['campaign' => $campaign]);
    }
}