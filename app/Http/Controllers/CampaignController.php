<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\User; // Pastikan ini ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    /**
     * Menampilkan campaign unggulan di halaman beranda.
     */
    public function home()
    {
        $campaigns = Campaign::where('status', 'aktif')->latest()->take(4)->get();
        return view('home', ['campaigns' => $campaigns]);
    }

    /**
     * Menampilkan semua campaign di halaman donasi.
     */
    public function index()
    {
        $campaigns = Campaign::where('status', 'aktif')->latest()->paginate(12); // Menggunakan paginate untuk banyak data
        return view('donate', ['campaigns' => $campaigns]);
    }

    /**
     * Menampilkan detail satu campaign.
     */
    public function show(Campaign $campaign)
    {
        return view('donatemenu', ['campaign' => $campaign]);
    }

    /**
     * MENAMPILKAN halaman form untuk membuat campaign baru (Galang Dana).
     */
    public function create()
    {
        return view('galangdana');
    }

    /**
     * MENYIMPAN data campaign baru dari form Galang Dana ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi semua input dari form
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi_singkat' => 'required|string|max:255',
            'deskripsi_lengkap' => 'required|string',
            'target_dana' => 'required|numeric|min:1000000',
            'batas_waktu' => 'required|date',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
        ]);

        // 2. Handle upload gambar
        $gambarPath = $request->file('gambar')->store('campaigns', 'public');

        // 3. Buat campaign baru di database
        Campaign::create([
            'user_id' => Auth::id(), // Mengambil ID user yang sedang login
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . uniqid(),
            'kategori' => $request->kategori,
            'deskripsi_singkat' => Str::limit($request->deskripsi_lengkap, 150), // Ambil 150 karakter pertama sebagai deskripsi singkat
            'deskripsi_lengkap' => $request->deskripsi_lengkap,
            'target_dana' => $request->target_dana,
            'batas_waktu' => $request->batas_waktu,
            'gambar_url' => $gambarPath,
            'status' => 'pending', // Campaign baru selalu butuh verifikasi admin
        ]);

        // 4. Arahkan pengguna ke halaman lain dengan pesan sukses
        return redirect()->route('home')->with('success', 'Campaign Anda berhasil dibuat dan sedang menunggu verifikasi oleh tim kami.');
    }
}