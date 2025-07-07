<?php
// File: app/Http/Middleware/UpdateUserLastSeenAt.php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUserLastSeenAt
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Update timestamp last_seen_at untuk user yang sedang login
            Auth::user()->update(['last_seen_at' => now()]);
        }
        return $next($request);
    }
}