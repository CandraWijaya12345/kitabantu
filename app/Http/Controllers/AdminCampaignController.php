<?php
// File: app/Http/Controllers/AdminCampaignController.php
namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class AdminCampaignController extends Controller
{
    /**
     * Menampilkan semua campaign dan campaign yang perlu verifikasi.
     */
    public function index()
    {
        // Ambil semua campaign KECUALI yang statusnya 'pending'
        $campaigns = Campaign::where('status', '!=', 'pending')
                             ->latest()->paginate(10, ['*'], 'campaigns_page');

        // Ambil hanya campaign yang statusnya 'pending'
        $pendingCampaigns = Campaign::where('status', 'pending')
                                    ->with('user') // Ambil data user pembuatnya
                                    ->latest()->paginate(10, ['*'], 'pending_page');

        return view('admincampaign', compact('campaigns', 'pendingCampaigns'));
    }

    /**
     * Menyetujui sebuah campaign.
     */
    public function approve(Campaign $campaign)
    {
        $campaign->update(['status' => 'aktif']);
        return back()->with('success', 'Campaign berhasil disetujui dan sekarang aktif.');
    }

    /**
     * Menolak sebuah campaign.
     */
    public function reject(Request $request, Campaign $campaign)
    {
        $request->validate(['rejection_reason' => 'required|string|min:10']);
        // Anda mungkin perlu menambahkan kolom 'rejection_reason' di tabel campaigns
        $campaign->update([
            'status' => 'ditolak',
            // 'rejection_reason' => $request->rejection_reason 
        ]);
        return back()->with('success', 'Campaign telah ditolak.');
    }

    /**
     * Menghapus sebuah campaign.
     */
    public function destroy(Campaign $campaign)
    {
        // Hapus file gambar terkait jika ada
        // Storage::disk('public')->delete($campaign->gambar_url);
        $campaign->delete();
        return back()->with('success', 'Campaign berhasil dihapus.');
    }
}