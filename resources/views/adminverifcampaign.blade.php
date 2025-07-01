<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Campaign - Admin KitaBantu</title>
    <link rel="stylesheet" href="/css/adminverifcampaign.css">
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
                <a href="/admin/verifcampaign" class="nav-item active">
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
                <a href="/admin/verifkitatolong" class="nav-item">
                    <img src="./img/icon-verifikasi-kitatolong.png" alt="" class="nav-icon">
                    <span>Verifikasi KitaTolong</span>
                </a>
            </nav>
            <div class="sidebar-footer">
                <a href="#" class="nav-item logout">
                    <img src="/public/img/logout.png" alt="" class="nav-icon">
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div class="search-bar">
                    <img src="./img/search-icon-gray.png" alt="Search">
                    <input type="text" placeholder="Cari campaign yang perlu diverifikasi...">
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
                    <h3>Verifikasi Campaign</h3>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Judul Campaign</th>
                                <th>Pemilik</th>
                                <th>Target Dana</th>
                                <th>Tgl Diajukan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pembangunan Ulang Jembatan Desa Sukamaju</td>
                                <td>Ahmad Winarno</td>
                                <td>Rp250.000.000</td>
                                <td>28 Jun 2025</td>
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
                                <td>Beasiswa Pendidikan untuk Anak Yatim</td>
                                <td>Yayasan Harapan Bunda</td>
                                <td>Rp50.000.000</td>
                                <td>27 Jun 2025</td>
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
                                <td>Konser Amal Musik Indie</td>
                                <td>Komunitas Suara Senja</td>
                                <td>Rp30.000.000</td>
                                <td>26 Jun 2025</td>
                                <td><span class="status-tag success">Diterima</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-action detail">Detail</a>
                                    </div>
                                </td>
                            </tr>
                             <tr>
                                <td>Bantuan untuk Korban Kebakaran Pasar</td>
                                <td>Paguyuban Pedagang</td>
                                <td>Rp120.000.000</td>
                                <td>25 Jun 2025</td>
                                <td><span class="status-tag rejected">Ditolak</span></td>
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
            <p>Anda yakin ingin menyetujui campaign ini dan menampilkannya kepada publik?</p>
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
            <label for="rejectionReason">Mohon berikan alasan mengapa campaign ini ditolak:</label>
            <textarea id="rejectionReason" rows="5" placeholder="Contoh: Dokumen pendukung tidak lengkap..."></textarea>
        </div>
        <div class="modal-footer">
            <button class="btn-modal cancel">Batal</button>
            <button class="btn-modal confirm-reject">Kirim Penolakan</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalOverlay = document.getElementById('modalOverlay');
            
            // Modal persetujuan
            const approveModal = document.getElementById('approveModal');
            const approveButtons = document.querySelectorAll('.btn-action.approve');
            
            // Modal penolakan
            const rejectModal = document.getElementById('rejectModal');
            const rejectButtons = document.querySelectorAll('.btn-action.reject');

            // Tombol tutup & batal di semua modal
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

            approveButtons.forEach(button => {
                button.addEventListener('click', () => openModal(approveModal));
            });

            rejectButtons.forEach(button => {
                button.addEventListener('click', () => openModal(rejectModal));
            });

            closeButtons.forEach(button => {
                button.addEventListener('click', closeModal);
            });

            cancelButtons.forEach(button => {
                button.addEventListener('click', closeModal);
            });

            modalOverlay.addEventListener('click', closeModal);
        });
    </script>

</body>
</html>