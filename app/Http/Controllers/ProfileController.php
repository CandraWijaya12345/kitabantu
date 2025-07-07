<?php
// File: app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // <-- JANGAN LUPA TAMBAHKAN INI
use Illuminate\Validation\Rules\Password;
use App\Models\Campaign;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     */
    public function show()
    {
        $user = Auth::user();
        return view('user', ['user' => $user]);
    }

    /**
     * Memperbarui profil pengguna.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'nomor_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);

        // Update data di tabel 'users'
        $user->update(['name' => $validated['name']]);

        // Update atau buat data di tabel 'user_details'
        $user->detail()->updateOrCreate(
            ['user_id' => $user->id], // Kondisi pencarian
            [ // Data yang akan diupdate atau dibuat
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'nomor_hp' => $validated['nomor_hp'],
                'alamat' => $validated['alamat'],
                'bio' => $validated['bio'],
            ]
        );

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }

        public function showChangePasswordForm()
    {
        return view('ganti_password');
    }
      public function updatePassword(Request $request)
    {
        # 1. Validasi
        $validated = $request->validate([
            // 'current_password' akan memeriksa apakah input cocok dengan password user di database
            'current_password' => ['required', 'current_password'],
            // 'new_password' harus dikonfirmasi oleh input 'new_password_confirmation'
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        # 2. Update Password
        // Jika validasi berhasil, update password user dengan yang baru
        // Hash::make() sangat penting untuk mengenkripsi password sebelum disimpan
        Auth::user()->update([
            'password' => Hash::make($validated['new_password'])
        ]);

        # 3. Redirect dengan pesan sukses
        return back()->with('success', 'Password berhasil diperbarui!');
    }

        public function myCampaigns()
    {
        // Ambil semua campaign yang user_id-nya sama dengan ID user yang login
        // Urutkan dari yang paling baru dibuat
        $myCampaigns = Campaign::where('user_id', Auth::id())
                               ->latest()
                               ->get();

        // Kirim data ke view 'list_campaign'
        return view('list_campaign', ['campaigns' => $myCampaigns]);
    }

}