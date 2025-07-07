<?php
// File: app/Http/Controllers/AdminKitaTolongController.php
namespace App\Http\Controllers;

use App\Models\HelpRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminKitaTolongController extends Controller
{
    public function index(Request $request)
    {
        $query = HelpRequest::with(['user', 'volunteer']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('kategori', 'like', '%' . $search . '%')
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', '%' . $search . '%');
                  });
            });
        }

        // Pastikan kedua variabel ini didefinisikan dengan benar
        $approvedRequests = (clone $query)->whereIn('status', ['diterima', 'selesai'])->latest()->paginate(10, ['*'], 'approved_page');
        $pendingRequests = (clone $query)->where('status', 'pending')->latest()->paginate(10, ['*'], 'pending_page');
        
        $volunteers = User::whereIn('role', ['volunteer', 'admin'])->get();

        // PASTIKAN 'pendingRequests' ADA DI DALAM COMPACT
        return view('adminkitatolong', compact('approvedRequests', 'pendingRequests', 'volunteers'));
    }

    public function approve(HelpRequest $helpRequest)
    {
        $helpRequest->update(['status' => 'diterima']);
        return back()->with('success', 'Permintaan telah disetujui.');
    }

    public function reject(Request $request, HelpRequest $helpRequest)
    {
        $helpRequest->update(['status' => 'ditolak']);
        return back()->with('success', 'Permintaan telah ditolak.');
    }

    public function assignVolunteer(Request $request, HelpRequest $helpRequest)
    {
        $request->validate(['volunteer_id' => 'required|exists:users,id']);
        $helpRequest->update(['volunteer_id' => $request->volunteer_id, 'status' => 'diterima']);
        return back()->with('success', 'Volunteer berhasil ditugaskan.');
    }
}