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
                    <button class="tab-btn" data-target="verification-view">Verifikasi Permintaan</button>
                </div>

                <div class="tab-content active" id="list-view">
                    <div class="widget-header">
                        <h3>Manajemen Permintaan KitaTolong</h3>
                    </div>
                    <div class="table-container">
                        <table class="data-table">
                           <thead>
                            <tr>
                                <th>Pemohon</th>
                                <th>Kategori</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Volunteer Ditugaskan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Citra Lestari</td>
                                <td>Pendamping Lansia</td>
                                <td>30 Jul 2025</td>
                                <td><button class="btn-action assign">Tugaskan</button></td>
                                <td><span class="status-tag success">Akan Datang</span></td>
                                <td><a href="#" class="btn-action detail">Detail</a></td>
                            </tr>
                            <tr>
                                <td>Budi Santoso</td>
                                <td>Evakuasi Barang</td>
                                <td>28 Jul 2025</td>
                                <td>Rina Melati</td>
                                <td><span class="status-tag success">Akan Datang</span></td>
                                <td><a href="#" class="btn-action detail">Detail</a></td>
                            </tr>
                             <tr>
                                <td>Eko Prasetyo</td>
                                <td>Menjaga Posko</td>
                                <td>15 Jun 2025</td>
                                <td>Andi Wijaya</td>
                                <td><span class="status-tag completed">Selesai</span></td>
                                <td><a href="#" class="btn-action detail">Detail</a></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#" class="active">1</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>

                <div class="tab-content" id="verification-view">
                    <div class="widget-header">
                        <h3>Verifikasi Permintaan KitaTolong</h3>
                    </div>
                    <div class="table-container">
                        <table class="data-table">
                             <thead>
                                <tr>
                                    <th>Pemohon</th>
                                    <th>Kategori</th>
                                    <th>Tgl Diajukan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Fajar Nugroho</td>
                                    <td>Pembersihan Area Bencana</td>
                                    <td>29 Jun 2025</td>
                                    <td><span class="status-tag pending">Pending</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="#" class="btn-action detail">Detail</a>
                                            <button class="btn-action approve">Setujui</button>
                                            <button class="btn-action reject">Tolak</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Siti Aminah</td>
                                    <td>Pengantaran Lansia</td>
                                    <td>29 Jun 2025</td>
                                    <td><span class="status-tag pending">Pending</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="#" class="btn-action detail">Detail</a>
                                            <button class="btn-action approve">Setujui</button>
                                            <button class="btn-action reject">Tolak</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#" class="active">1</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <div class="modal-overlay" id="modalOverlay"></div>

    <div class="modal" id="approveModal">
        <div class="modal-header"><h3>Konfirmasi Persetujuan</h3><button class="close-modal">&times;</button></div>
        <div class="modal-body"><p>Anda yakin ingin menyetujui permintaan ini?</p></div>
        <div class="modal-footer"><button class="btn-modal cancel">Batal</button><button class="btn-modal confirm-approve">Ya, Setujui</button></div>
    </div>

    <div class="modal" id="rejectModal">
        <div class="modal-header"><h3>Alasan Penolakan</h3><button class="close-modal">&times;</button></div>
        <div class="modal-body">
            <label for="rejectionReason">Mohon berikan alasan mengapa permintaan ini ditolak:</label>
            <textarea id="rejectionReason" rows="5" placeholder="Contoh: Permintaan di luar jangkauan..."></textarea>
        </div>
        <div class="modal-footer"><button class="btn-modal cancel">Batal</button><button class="btn-modal confirm-reject">Kirim Penolakan</button></div>
    </div>
    
    <div class="modal" id="assignVolunteerModal">
        <div class="modal-header"><h3>Tugaskan Volunteer</h3><button class="close-modal">&times;</button></div>
        <div class="modal-body">
            <label for="volunteerSelect">Pilih volunteer untuk permintaan ini:</label>
            <select id="volunteerSelect" class="form-control">
                <option disabled selected>-- Pilih Volunteer --</option>
                <option value="andi_wijaya">Andi Wijaya</option>
                <option value="rina_melati">Rina Melati</option>
            </select>
        </div>
        <div class="modal-footer"><button class="btn-modal cancel">Batal</button><button class="btn-modal confirm-assign">Simpan</button></div>
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
                        if (content.id === target) {
                            content.classList.add('active');
                        }
                    });
                });
            });

            // --- LOGIKA UNTUK SEMUA MODAL/POPUP ---
            const modalOverlay = document.getElementById('modalOverlay');
            const modals = {
                approve: document.getElementById('approveModal'),
                reject: document.getElementById('rejectModal'),
                assign: document.getElementById('assignVolunteerModal')
            };

            const openModalButtons = {
                approve: document.querySelectorAll('.btn-action.approve'),
                reject: document.querySelectorAll('.btn-action.reject'),
                assign: document.querySelectorAll('.btn-action.assign')
            };

            const closeButtons = document.querySelectorAll('.close-modal');
            const cancelButtons = document.querySelectorAll('.btn-modal.cancel');

            function openModal(modal) {
                if(modal) {
                    modalOverlay.classList.add('show');
                    modal.classList.add('show');
                }
            }

            function closeModal() {
                modalOverlay.classList.remove('show');
                document.querySelectorAll('.modal.show').forEach(modal => {
                    modal.classList.remove('show');
                });
            }

            for (const key in openModalButtons) {
                openModalButtons[key].forEach(button => {
                    button.addEventListener('click', () => openModal(modals[key]));
                });
            }

            closeButtons.forEach(button => button.addEventListener('click', closeModal));
            cancelButtons.forEach(button => button.addEventListener('click', closeModal));
            modalOverlay.addEventListener('click', closeModal);
        });
    </script>

</body>
</html>