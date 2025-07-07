<?php
// File: app/Http/Controllers/AdminSettingsController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminSettingsController extends Controller
{
    /**
     * Menampilkan halaman pengaturan.
     */
    public function show()
    {
        // Mengambil data user admin yang sedang login
        $user = Auth::user();
        return view('adminsettings', compact('user'));
    }

    /**
     * Memperbarui informasi profil admin.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'nomor_hp' => 'nullable|string|max:20',
        ]);

        // Update data di tabel 'users'
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        // Update atau buat data di tabel 'user_details'
        $user->detail()->updateOrCreate(
            ['user_id' => $user->id],
            ['nomor_hp' => $validated['nomor_hp']]
        );

        return back()->with('success_profile', 'Informasi profil berhasil diperbarui.');
    }

    /**
     * Memperbarui password admin.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        Auth::user()->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return back()->with('success_password', 'Password berhasil diperbarui.');
    }
}