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
    public function index(Request $request)
    {
        // Ambil input 'sort' dari URL, jika tidak ada, default-nya 'terbaru'
        $sortOption = $request->input('sort', 'terbaru');

        // Mulai query builder untuk campaign yang aktif
        $query = Campaign::where('status', 'aktif');

        // Terapkan sorting berdasarkan pilihan pengguna
        switch ($sortOption) {
            case 'terbaru':
                $query->latest(); // Sama dengan orderBy('created_at', 'desc')
                break;
            case 'akan_berakhir':
                $query->orderBy('batas_waktu', 'asc');
                break;
            case 'paling_lama':
                $query->oldest(); // Sama dengan orderBy('created_at', 'asc')
                break;
            // Anda bisa menambahkan opsi lain di sini jika perlu
        }

        // Eksekusi query untuk mendapatkan hasilnya
        $campaigns = $query->get(); // Kita tetap pakai get() sesuai permintaan sebelumnya

        // Kirim data ke view 'donate' beserta opsi sort yang aktif
        return view('donate', [
            'campaigns' => $campaigns,
            'sortOption' => $sortOption
        ]);
    }

    /**
     * Menampilkan detail satu campaign.
     */
    public function show(Campaign $campaign)
    {
        // Kunci unik untuk session berdasarkan ID campaign
        $sessionKey = 'viewed_campaign_' . $campaign->id;

        // Cek apakah session untuk campaign ini belum ada
        if (!session()->has($sessionKey)) {
            // Jika belum ada, naikkan view_count sebesar 1
            $campaign->increment('view_count');

            // Set session agar view tidak dihitung lagi jika user me-refresh halaman
            session([$sessionKey => true]);
        }

        // Mengambil donasi yang statusnya berhasil
        $donations = $campaign->donations()
                              ->where('status', 'success') // Anda bisa sesuaikan status ini
                              ->latest()
                              ->get();

        // Kirim data campaign DAN data donasi ke view
        return view('donatemenu', [
            'campaign' => $campaign,
            'donations' => $donations
        ]);
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

        public function search(Request $request)
    {
        // Ambil kata kunci pencarian dari input 'query'
        $searchQuery = $request->input('query');

        // Mulai query untuk campaign yang aktif
        $query = Campaign::where('status', 'aktif');

        // Jika ada kata kunci pencarian, filter hasilnya
        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('judul', 'like', '%' . $searchQuery . '%')
                  ->orWhere('deskripsi_lengkap', 'like', '%' . $searchQuery . '%');
            });
        }

        // Ambil semua hasil yang cocok, urutkan dari yang terbaru
        $campaigns = $query->latest()->get();

        // Kirim data ke view search_campaign
        return view('search_campaign', [
            'campaigns' => $campaigns,
            'searchQuery' => $searchQuery // Kirim juga kata kunci untuk ditampilkan kembali
        ]);
    }
}