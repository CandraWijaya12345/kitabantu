<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi KitaTolong - Admin KitaBantu</title>
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
                    <img src="./img/icon-dashboard.png" alt="" class="nav-icon">
                    <span>Dashboard</span>
                </a>
                <a href="/admin/campaign" class="nav-item">
                    <img src="./img/icon-campaign.png" alt="" class="nav-icon">
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
                <a href="/admin/verifcampaign" class="nav-item">
                    <img src="./img/icon-verifikasi.png" alt="" class="nav-icon">
                    <span>Verifikasi Campaign</span>
                </a>
                <a href="/admin/tarikdana" class="nav-item"> <img src="./img/icon-penarikan-dana.png" alt="" class="nav-icon">
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
                <a href="/admin/kitatolong" class="nav-item"> <img src="./img/icon-kitatolong.png" alt="" class="nav-icon">
                    <span>KitaTolong</span>
                </a>
                <a href="/admin/verifkitatolong" class="nav-item active">
                    <img src="./img/icon-verifikasi-kitatolong.png" alt="" class="nav-icon">
                    <span>Verifikasi KitaTolong</span>
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
                    <input type="text" placeholder="Cari permintaan pertolongan...">
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
                <div class="widget-header">
                    <h3>Verifikasi Permintaan KitaTolong</h3>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Pemohon</th>
                                <th>Kategori</th>
                                <th>Tanggal Permintaan</th>
                                <th>Volunteer Ditugaskan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Budi Santoso</td>
                                <td>Pengantaran Lansia</td>
                                <td>30 Jul 2025</td>
                                <td>-</td>
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
                                <td>Citra Lestari</td>
                                <td>Pendamping</td>
                                <td>29 Jul 2025</td>
                                <td>Rina Melati</td>
                                <td><span class="status-tag success">Disetujui</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-action detail">Detail</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Eko Prasetyo</td>
                                <td>Evakuasi Barang</td>
                                <td>28 Jul 2025</td>
                                <td>-</td>
                                <td><span class="status-tag rejected">Ditolak</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-action detail">Detail</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Dewi Anggraini</td>
                                <td>Menjaga Posko</td>
                                <td>25 Jul 2025</td>
                                <td>Andi Wijaya</td>
                                <td><span class="status-tag completed">Selesai</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-action detail">Detail</a>
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
            </section>
        </main>
    </div>

    <div class="modal-overlay" id="modalOverlay"></div>

    <div class="modal" id="approveModal">
        <div class="modal-header">
            <h3>Konfirmasi Persetujuan</h3>
            <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
            <p>Anda yakin ingin menyetujui permintaan pertolongan ini?</p>
        </div>
        <div class="modal-footer">
            <button class="btn-modal cancel">Batal</button>
            <button class="btn-modal confirm-approve">Ya, Setujui</button>
        </div>
    </div>

    <div class="modal" id="rejectModal">
        <div class="modal-header">
            <h3>Alasan Penolakan</h3>
            <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
            <label for="rejectionReason">Mohon berikan alasan mengapa permintaan ini ditolak:</label>
            <textarea id="rejectionReason" rows="5" placeholder="Contoh: Permintaan di luar jangkauan operasional..."></textarea>
        </div>
        <div class="modal-footer">
            <button class="btn-modal cancel">Batal</button>
            <button class="btn-modal confirm-reject">Kirim Penolakan</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalOverlay = document.getElementById('modalOverlay');
            const approveModal = document.getElementById('approveModal');
            const rejectModal = document.getElementById('rejectModal');
            
            const approveButtons = document.querySelectorAll('.btn-action.approve');
            const rejectButtons = document.querySelectorAll('.btn-action.reject');

            const closeButtons = document.querySelectorAll('.close-modal');
            const cancelButtons = document.querySelectorAll('.btn-modal.cancel');

            function openModal(modal) {
                modalOverlay.classList.add('show');
                modal.classList.add('show');
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