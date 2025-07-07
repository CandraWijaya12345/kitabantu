<?php
// File: app/Http/Controllers/AdminUserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}