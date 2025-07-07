<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Campaign - Admin</title>
    <link rel="stylesheet" href="{{ secure_asset('css/admincampaign.css') }}">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="/admin/dashboard" class="logo">KitaBantu</a>
            </div>
            <nav class="sidebar-nav">
                <a href="/admin/dashboard" class="nav-item">
                    <img src="/img/dashboardadmin.png" alt="Dashboard Icon" class="nav-icon">
                    <span>Dashboard</span>
                </a>
                <a href="/admin/campaign" class="nav-item active">
                    <img src="/img/ads.png" alt="Campaign" class="nav-icon"> 
                    <span>Campaign</span>
                </a>
                <a href="/admin/donasi" class="nav-item">
                    <img src="/img/donationicon.png" alt="Donasi Icon" class="nav-icon">
                    <span>Donasi</span>
                </a>
                <a href="/admin/user" class="nav-item">
                    <img src="/img/usericon.png" alt="User Icon" class="nav-icon">
                    <span>User</span>
                </a>
                <a href="/admin/tarikdana" class="nav-item">
                    <img src="/img/penarikandanaicon.png" alt="Penarikan Dana Icon" class="nav-icon">
                    <span>Penarikan Dana</span>
                </a>
                 <a href="/admin/statistik" class="nav-item">
                    <img src="/img/statistikicon.png" alt="Statistik Icon" class="nav-icon">
                    <span>Statistik</span>
                </a>
                 <a href="/admin/settings" class="nav-item">
                    <img src="/img/settingicon.png" alt="Setting Icon" class="nav-icon">
                    <span>Pengaturan</span>
                </a>
                 <a href="/admin/kitatolong" class="nav-item">
                    <img src="/img/kitatolongicon.png" alt="Kita Tolong Icon" class="nav-icon">
                    <span>KitaTolong</span>
                </a>
            </nav>
            <div class="sidebar-footer">
                <a href="#" class="nav-item logout">
                    <img src="/img/logout.png" alt="Logout Icon" class="nav-icon">
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div class="search-bar">
                    <img src="/img/search.png" alt="Search">
                    <input type="text" placeholder="Cari Campaign...">
                </div>
                <div class="admin-profile">
                    <div class="profile-info">
                        <p class="profile-name">Admin</p>
                        <p class="profile-role">Super Admin</p>
                    </div>
                    <img src="/img/adminicon.png" alt="Admin Avatar" class="profile-avatar">
                </div>
            </header>

            <section class="widget list-widget">
                <div class="widget-tabs">
                    <button class="tab-btn active" data-target="list-view">List Campaign</button>
                    <button class="tab-btn" data-target="verification-view">Verifikasi Campaign ({{ $pendingCampaigns->total() }})</button>
                </div>

                {{-- TAB 1: LIST SEMUA CAMPAIGN --}}
                <div class="tab-content active" id="list-view">
                    <div class="widget-header"><h3>List Semua Campaign</h3></div>
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Judul Campaign</th>
                                    <th>Kategori</th>
                                    <th>Target Dana</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($campaigns as $campaign)
                                <tr>
                                    <td>{{ Str::limit($campaign->judul, 40) }}</td>
                                    <td>{{ $campaign->kategori }}</td>
                                    <td>Rp{{ number_format($campaign->target_dana) }}</td>
                                    <td><span class="status-tag {{ strtolower($campaign->status) }}">{{ $campaign->status }}</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="#" class="btn-edit">Edit</a>
                                            <form action="{{ route('admin.campaigns.destroy', $campaign->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus campaign ini secara permanen?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5">Tidak ada data campaign.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination Links --}}
                    <div class="pagination">{{ $campaigns->links() }}</div>
                </div>

                {{-- TAB 2: VERIFIKASI CAMPAIGN --}}
                <div class="tab-content" id="verification-view">
                    <div class="widget-header"><h3>Campaign Menunggu Verifikasi</h3></div>
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Judul Campaign</th>
                                    <th>Pemilik</th>
                                    <th>Target Dana</th>
                                    <th>Tgl Diajukan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pendingCampaigns as $campaign)
                                <tr>
                                    <td>{{ Str::limit($campaign->judul, 30) }}</td>
                                    <td>{{ $campaign->user->name }}</td>
                                    <td>Rp{{ number_format($campaign->target_dana) }}</td>
                                    <td>{{ $campaign->created_at->format('d M Y') }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('donate.menu', $campaign->slug) }}" target="_blank" class="btn-action detail">Detail</a>
                                            <button class="btn-action approve" data-action="{{ route('admin.campaigns.approve', $campaign->id) }}">Setujui</button>
                                            <button class="btn-action reject" data-action="{{ route('admin.campaigns.reject', $campaign->id) }}">Tolak</button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5">Tidak ada campaign yang perlu diverifikasi.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination Links --}}
                    <div class="pagination">{{ $pendingCampaigns->links() }}</div>
                </div>
            </section>
        </main>
    </div>

    <div class="modal-overlay" id="modalOverlay"></div>

    <div class="modal" id="approveModal">
        {{-- Form ini akan diisi action-nya oleh JavaScript --}}
        <form id="approveForm" action="" method="POST">
            @csrf
            <div class="modal-header">
                <h3>Konfirmasi Persetujuan</h3>
                <button type="button" class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menyetujui campaign ini dan menampilkannya kepada publik?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-modal cancel">Batal</button>
                {{-- Tombol ini sekarang men-submit form 'approveForm' saat diklik --}}
                <button type="button" class="btn-modal confirm-approve" onclick="document.getElementById('approveForm').submit();">Ya, Setujui</button>
            </div>
        </form>
    </div>

    <div class="modal" id="rejectModal">
        {{-- Form ini akan diisi action-nya oleh JavaScript --}}
        <form id="rejectForm" action="" method="POST">
            @csrf
            <div class="modal-header">
                <h3>Alasan Penolakan</h3>
                <button type="button" class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <label for="rejectionReason">Mohon berikan alasan mengapa campaign ini ditolak:</label>
                {{-- Pastikan textarea memiliki 'name' --}}
                <textarea id="rejectionReason" name="rejection_reason" rows="5" placeholder="Contoh: Dokumen pendukung tidak lengkap..." required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-modal cancel">Batal</button>
                {{-- Tombol ini sekarang adalah tombol submit dari form 'rejectForm' --}}
                <button type="submit" class="btn-modal confirm-reject">Kirim Penolakan</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- LOGIKA UNTUK TAB SUB-MENU ---
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    const target = button.dataset.target;
                    tabContents.forEach(content => {
                        content.classList.remove('active');
                        if (content.id === target) content.classList.add('active');
                    });
                });
            });

            // --- LOGIKA UNTUK MODAL/POPUP ---
            const modalOverlay = document.getElementById('modalOverlay');
            const approveModal = document.getElementById('approveModal');
            const rejectModal = document.getElementById('rejectModal');
            const approveForm = document.getElementById('approveForm');
            const rejectForm = document.getElementById('rejectForm');

            function openModal(modal, actionUrl) {
                if(modal && actionUrl) {
                    // Set action form di dalam modal sesuai tombol yang diklik
                    if(modal.id === 'approveModal') approveForm.action = actionUrl;
                    if(modal.id === 'rejectModal') rejectForm.action = actionUrl;
                    
                    modalOverlay.classList.add('show');
                    modal.classList.add('show');
                }
            }

        function closeModal() {
            modalOverlay.classList.remove('show');
            approveModal.classList.remove('show');
            rejectModal.classList.remove('show');
        }

        // Menempelkan SATU event listener pada elemen utama
        document.body.addEventListener('click', function(event) {
            const target = event.target; // Element yang diklik

            // Cek jika yang diklik adalah tombol 'Setujui'
            if (target.matches('.btn-action.approve')) {
                const actionUrl = target.dataset.action;
                const approveForm = document.getElementById('approveForm');
                if (approveForm) {
                    approveForm.action = actionUrl;
                }
                modalOverlay.classList.add('show');
                approveModal.classList.add('show');
            }

            // Cek jika yang diklik adalah tombol 'Tolak'
            if (target.matches('.btn-action.reject')) {
                const actionUrl = target.dataset.action;
                const rejectForm = document.getElementById('rejectForm');
                if (rejectForm) {
                    rejectForm.action = actionUrl;
                }
                modalOverlay.classList.add('show');
                rejectModal.classList.add('show');
            }

            // Cek jika yang diklik adalah tombol close atau cancel
            if (target.matches('.close-modal') || target.matches('.btn-modal.cancel')) {
                closeModal();
            }
        });

        // Menutup modal jika area overlay diklik
        modalOverlay.addEventListener('click', closeModal);
    });
    </script>
</body>
</html>