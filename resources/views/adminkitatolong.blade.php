<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen KitaTolong - Admin KitaBantu</title>
    <link rel="stylesheet" href="/css/adminkitatolong.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="logo">KitaBantu</a>
            </div>
            <nav class="sidebar-nav">
                <a href="/admin/dashboard" class="nav-item ">
                    <img src="/img/dashboardadmin.png" alt="Dashboard Icon" class="nav-icon">
                    <span>Dashboard</span>
                </a>
                <a href="/admin/campaign" class="nav-item">
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
                <a href="/admin/kitatolong" class="nav-item active">
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
                    <input type="text" placeholder="Cari permintaan pertolongan...">
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
                    <button class="tab-btn active" data-target="list-view">List Permintaan</button>
                    <button class="tab-btn" data-target="verification-view">Verifikasi Permintaan ({{ $pendingRequests->total() }})</button>
                </div>

                {{-- TAB 1: LIST PERMINTAAN DISETUJUI --}}
                <div class="tab-content active" id="list-view">
                    <div class="table-container">
                        <table class="data-table">
                            <thead><tr><th>Pemohon</th><th>Kategori</th><th>Tanggal</th><th>Volunteer</th><th>Status</th><th>Aksi</th></tr></thead>
                            <tbody>
                                @forelse($approvedRequests as $request)
                                <tr>
                                    <td>{{ $request->user->name }}</td>
                                    <td>{{ $request->kategori }}</td>
                                    <td>{{ \Carbon\Carbon::parse($request->tanggal_pertolongan)->format('d M Y') }}</td>
                                    <td>
                                        @if($request->volunteer)
                                            {{-- Jika sudah ada, tampilkan nama sebagai tombol untuk MENGGANTI --}}
                                            <button class="btn-action assign re-assign" 
                                                    data-action="{{ route('admin.kitatolong.assign', $request->id) }}"
                                                    data-current-volunteer="{{ $request->volunteer->id }}">
                                                {{ $request->volunteer->name }} (Ganti)
                                            </button>
                                        @else
                                            {{-- Jika belum ada, tampilkan tombol untuk MENUGASKAN --}}
                                            <button class="btn-action assign" data-action="{{ route('admin.kitatolong.assign', $request->id) }}">Tugaskan</button>
                                        @endif
                                    </td>
                                    <td><span class="status-tag {{ strtolower($request->status) }}">{{ $request->status }}</span></td>
                                    <td><a href="#" class="btn-action detail">Detail</a></td>
                                </tr>
                                @empty
                                <tr><td colspan="6">Belum ada permintaan yang disetujui.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">{{ $approvedRequests->appends(['search' => request('search')])->links() }}</div>
                </div>

                {{-- TAB 2: VERIFIKASI PERMINTAAN --}}
                <div class="tab-content" id="verification-view">
                     <div class="table-container">
                        <table class="data-table">
                            <thead><tr><th>Pemohon</th><th>Kategori</th><th>Diajukan</th><th>Status</th><th>Aksi</th></tr></thead>
                            <tbody>
                                @forelse($pendingRequests as $request)
                                <tr>
                                    <td>{{ $request->user->name }}</td>
                                    <td>{{ $request->kategori }}</td>
                                    <td>{{ $request->created_at->format('d M Y') }}</td>
                                    <td><span class="status-tag pending">Pending</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="#" class="btn-action detail">Detail</a>
                                            <button class="btn-action approve" data-action="{{ route('admin.kitatolong.approve', $request->id) }}">Setujui</button>
                                            <button class="btn-action reject" data-action="{{ route('admin.kitatolong.reject', $request->id) }}">Tolak</button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5">Tidak ada permintaan untuk diverifikasi.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">{{ $pendingRequests->appends(['search' => request('search')])->links() }}</div>
                </div>
            </section>
        </main>
    </div>

    <div class="modal-overlay" id="modalOverlay"></div>
    <div class="modal" id="approveModal"><form id="approveForm" action="" method="POST">@csrf <div class="modal-header"><h3>Konfirmasi Persetujuan</h3><button type="button" class="close-modal">&times;</button></div><div class="modal-body"><p>Anda yakin ingin menyetujui permintaan ini?</p></div><div class="modal-footer"><button type="button" class="btn-modal cancel">Batal</button><button type="submit" class="btn-modal confirm-approve">Ya, Setujui</button></div></form></div>
    <div class="modal" id="rejectModal"><form id="rejectForm" action="" method="POST">@csrf <div class="modal-header"><h3>Konfirmasi Penolakan</h3><button type="button" class="close-modal">&times;</button></div><div class="modal-body"><p>Anda yakin ingin menolak permintaan ini?</p></div><div class="modal-footer"><button type="button" class="btn-modal cancel">Batal</button><button type="submit" class="btn-modal confirm-reject">Ya, Tolak</button></div></form></div>
    <div class="modal" id="assignVolunteerModal">
        <form id="assignForm" action="" method="POST">
            @csrf
            <div class="modal-header"><h3>Tugaskan Volunteer</h3><button type="button" class="close-modal">&times;</button></div>
            <div class="modal-body">
                <label for="volunteerSelect">Pilih volunteer untuk permintaan ini:</label>
                <select id="volunteerSelect" name="volunteer_id" class="form-control" required>
                    <option disabled selected value="">-- Pilih Volunteer --</option>
                    @foreach($volunteers as $volunteer)
                        <option value="{{ $volunteer->id }}">{{ $volunteer->name }} ({{$volunteer->role}})</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer"><button type="button" class="btn-modal cancel">Batal</button><button type="submit" class="btn-modal confirm-assign">Simpan</button></div>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
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

        const modalOverlay = document.getElementById('modalOverlay');
        const modals = { approve: document.getElementById('approveModal'), reject: document.getElementById('rejectModal'), assign: document.getElementById('assignVolunteerModal') };
        const forms = { approve: document.getElementById('approveForm'), reject: document.getElementById('rejectForm'), assign: document.getElementById('assignForm') };

        function closeModal() {
            modalOverlay.classList.remove('show');
            Object.values(modals).forEach(modal => modal && modal.classList.remove('show'));
        }

        document.body.addEventListener('click', function(event) {
            const button = event.target;
            let modalKey = null;
            if (button.matches('.btn-action.approve')) modalKey = 'approve';
            else if (button.matches('.btn-action.reject')) modalKey = 'reject';
            else if (button.matches('.btn-action.assign')) modalKey = 'assign';
            
            if (modalKey) {
                const actionUrl = button.dataset.action;
                if (forms[modalKey]) forms[modalKey].action = actionUrl;
                if (modals[modalKey]) {
                    modalOverlay.classList.add('show');
                    modals[modalKey].classList.add('show');
                }
            }
            if (button.matches('.close-modal') || button.matches('.btn-modal.cancel')) {
                closeModal();
            }
        });
        modalOverlay.addEventListener('click', closeModal);
    });
    </script>

</body>
</html>