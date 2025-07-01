<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class CampaignController extends Controller
{
    // Untuk halaman / (beranda)
    public function home() {
        $campaigns = []; // Mengembalikan array kosong
        
        return view('home', ['campaigns' => $campaigns]);
    }

    // Untuk halaman /donate (list semua campaign)
    public function index() {
        
        $campaigns = []; // Mengembalikan array kosong
        
        return view('donate', ['campaigns' => $campaigns]);
    }

   
    public function show(Campaign $campaign) {
        return view('donatemenu', ['campaign' => $campaign]);
    }
}