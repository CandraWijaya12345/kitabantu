<?php
// File: app/Http/Controllers/HelpRequestController.php

namespace App\Http\Controllers;

use App\Models\HelpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelpRequestController extends Controller
{
    /**
     * Menampilkan formulir permintaan pertolongan.
     */
    public function create()
    {
        return view('formkitatolong');
    }

    /**
     * Menyimpan permintaan pertolongan baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk
        $validatedData = $request->validate([
            'kategori' => 'required|string',
            'detail_pertolongan' => 'required|string|min:20',
            'tanggal_pertolongan' => 'required|date|after_or_equal:today',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required|after:waktu_mulai',
            'lokasi' => 'required|string|max:255',
            'nama_pemohon' => 'required|string|max:255',
            'kontak_pemohon' => 'required|string|max:255',
            'terms' => 'required', // Checkbox persetujuan
        ]);

        // 2. Simpan data ke database
        HelpRequest::create([
            'user_id' => Auth::id(), // Ambil ID user yang sedang login
            'kategori' => $validatedData['kategori'],
            'detail_pertolongan' => $validatedData['detail_pertolongan'],
            'tanggal_pertolongan' => $validatedData['tanggal_pertolongan'],
            'waktu_mulai' => $validatedData['waktu_mulai'],
            'waktu_selesai' => $validatedData['waktu_selesai'],
            'lokasi' => $validatedData['lokasi'],
            'nama_pemohon' => $validatedData['nama_pemohon'],
            'kontak_pemohon' => $validatedData['kontak_pemohon'],
            // status default-nya 'pending'
        ]);

        // 3. Arahkan kembali dengan pesan sukses
        return redirect()->route('home')->with('success', 'Permintaan pertolongan Anda telah berhasil dikirim!');
    }
}