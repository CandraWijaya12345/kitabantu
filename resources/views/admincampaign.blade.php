<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Campaign - Admin KitaBantu</title>
    <link rel="stylesheet" href="/css/admincampaign.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="/admin/dashboard" class="logo">KitaBantu</a>
            </div>
            <nav class="sidebar-nav">
                <a href="/admin/dashboard" class="nav-item">
                    <img src="./img/icon-dashboard.png" alt="" class="nav-icon">
                    <span>Dashboard</span>
                </a>
                <a href="/admin/campaign" class="nav-item active"> <img src="./img/icon-campaign.png" alt="" class="nav-icon">
                    <span>Campaign</span>
                </a>
                <a href="/admin/donasi" class="nav-item">
                    <img src="./img/icon-donasi.png" alt="" class="nav-icon">
                    <span>Donasi</span>
                </a>
                <a href="/admin/user" class="nav-item">
                    <img src="./img/icon-user.png" alt="" class="nav-icon">
                    <span>User</span>
                </a>
                <a href="/admin/tarikdana" class="nav-item">
                    <img src="./img/icon-penarikan-dana.png" alt="" class="nav-icon">
                    <span>Penarikan Dana</span>
                </a>
                 <a href="/admin/statistik" class="nav-item">
                    <img src="./img/icon-statistik.png" alt="" class="nav-icon">
                    <span>Statistik</span>
                </a>
                 <a href="/admin/settings" class="nav-item">
                    <img src="./img/icon-pengaturan.png" alt="" class="nav-icon">
                    <span>Pengaturan</span>
                </a>
                 <a href="/admin/kitatolong" class="nav-item">
                    <img src="./img/icon-kitatolong.png" alt="" class="nav-icon">
                    <span>KitaTolong</span>
                </a>
            </nav>
            <div class="sidebar-footer">
                <a href="#" class="nav-item logout">
                    <img src="./img/icon-logout.png" alt="" class="nav-icon">
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div class="search-bar">
                    <img src="./img/search-icon-gray.png" alt="Search">
                    <input type="text" placeholder="Cari Campaign...">
                </div>
                <div class="admin-profile">
                    <div class="profile-info">
                        <p class="profile-name">Admin</p>
                        <p class="profile-role">Super Admin</p>
                    </div>
                    <img src="./img/admin-avatar.png" alt="Admin Avatar" class="profile-avatar">
                </div>
            </header>

            <section class="widget list-widget">
                <div class="widget-tabs">
                    <button class="tab-btn active" data-target="list-view">List Campaign</button>
                    <button class="tab-btn" data-target="verification-view">Verifikasi Campaign</button>
                </div>

                <div class="tab-content active" id="list-view">
                    <div class="widget-header">
                        <h3>List Semua Campaign</h3>
                        <a href="#" class="btn-add">+ Tambah Campaign</a>
                    </div>
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
                                <tr>
                                    <td>Bantu Renovasi Sekolah Tepian Negeri</td>
                                    <td>Pendidikan</td>
                                    <td>Rp50.000.000</td>
                                    <td><span class="status-tag active">Aktif</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="#" class="btn-edit">Edit</a>
                                            <a href="#" class="btn-delete">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Modal Usaha untuk Warung Pak Budi</td>
                                    <td>UMKM</td>
                                    <td>Rp5.000.000</td>
                                    <td><span class="status-tag rejected">Ditolak</span></td>
                                    <td>
                                        <div class="action-buttons">
                                             <a href="#" class="btn-edit">Edit</a>
                                            <a href="#" class="btn-delete">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>

                <div class="tab-content" id="verification-view">
                     <div class="widget-header">
                        <h3>Campaign Menunggu Verifikasi</h3>
                    </div>
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
                                <tr>
                                    <td>Pembangunan Jembatan Desa Sukamaju</td>
                                    <td>Ahmad Winarno</td>
                                    <td>Rp250.000.000</td>
                                    <td>28 Jun 2025</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="#" class="btn-action detail">Detail</a>
                                            <button class="btn-action approve">Setujui</button>
                                            <button class="btn-action reject">Tolak</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Beasiswa untuk Anak Yatim</td>
                                    <td>Yayasan Harapan Bunda</td>
                                    <td>Rp50.000.000</td>
                                    <td>27 Jun 2025</td>
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
        <div class="modal-body"><p>Anda yakin ingin menyetujui campaign ini dan menampilkannya kepada publik?</p></div>
        <div class="modal-footer"><button class="btn-modal cancel">Batal</button><button class="btn-modal confirm-approve">Ya, Setujui</button></div>
    </div>

    <div class="modal" id="rejectModal">
        <div class="modal-header"><h3>Alasan Penolakan</h3><button class="close-modal">&times;</button></div>
        <div class="modal-body">
            <label for="rejectionReason">Mohon berikan alasan mengapa campaign ini ditolak:</label>
            <textarea id="rejectionReason" rows="5" placeholder="Contoh: Dokumen pendukung tidak lengkap..."></textarea>
        </div>
        <div class="modal-footer"><button class="btn-modal cancel">Batal</button><button class="btn-modal confirm-reject">Kirim Penolakan</button></div>
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

            // --- LOGIKA UNTUK MODAL/POPUP ---
            const modalOverlay = document.getElementById('modalOverlay');
            const approveModal = document.getElementById('approveModal');
            const rejectModal = document.getElementById('rejectModal');
            
            const approveButtons = document.querySelectorAll('.btn-action.approve');
            const rejectButtons = document.querySelectorAll('.btn-action.reject');
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

            approveButtons.forEach(button => button.addEventListener('click', () => openModal(approveModal)));
            rejectButtons.forEach(button => button.addEventListener('click', () => openModal(rejectModal)));
            closeButtons.forEach(button => button.addEventListener('click', closeModal));
            cancelButtons.forEach(button => button.addEventListener('click', closeModal));
            modalOverlay.addEventListener('click', closeModal);
        });
    </script>
</body>
</html>