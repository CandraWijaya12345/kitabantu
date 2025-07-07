<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class AdminDonationController extends Controller
{
    public function index()
    {
        // Ambil semua donasi dengan relasi campaign
        $donations = Donation::with('campaign')->latest()->paginate(10);

        return view('admindonasi', compact('donations'));
    }

    
}