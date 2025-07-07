<?php
// File: app/Http/Controllers/AdminUserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        // Pastikan baris ini ada untuk menghitung user online
        $onlineUsersCount = User::where('last_seen_at', '>', now()->subMinutes(5))->count();

        $query = User::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }
        
        $users = $query->latest()->paginate(15);

        // PASTIKAN 'onlineUsersCount' ADA DI DALAM compact() ATAU ARRAY
        return view('adminuser', compact('users', 'onlineUsersCount'));
    }

        public function updateRole(Request $request, User $user)
    {
        // Validasi input role
        $request->validate([
            'role' => 'required|in:user,volunteer,admin', // Pastikan role yang dikirim valid
        ]);

        // Mencegah admin mengubah role diri sendiri untuk keamanan
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat mengubah role akun Anda sendiri.');
        }

        // Update role user
        $user->update([
            'role' => $request->role,
        ]);

        return back()->with('success', 'Role pengguna berhasil diperbarui.');
    }
}