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
                <a href="/admin/statistik" class="nav-item">
                    <img src="./img/icon-statistik.png" alt="" class="nav-icon">
                    <span>Statistik</span>
                </a>
                <a href="/admin/settings" class="nav-item">
                    <img src="./img/icon-pengaturan.png" alt="" class="nav-icon">
                    <span>Pengaturan</span>
                </a>
                <a href="/admin/kitatolong" class="nav-item active"> 
                    <img src="./img/icon-kitatolong.png" alt="" class="nav-icon">
                    <span>KitaTolong</span>
                </a>
                <a href="/admin/verifkitatolong" class="nav-item">
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
                    <input type="text" placeholder="Cari pemohon atau kategori...">
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
                    <h3>Manajemen Permintaan KitaTolong</h3>
                    <div class="filter-tabs">
                        <button class="tab-btn active">Semua</button>
                        <button class="tab-btn">Akan Datang</button>
                        <button class="tab-btn">Selesai</button>
                    </div>
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
                    <a href="#">2</a>
                    <a href="#">&raquo;</a>
                </div>
            </section>
        </main>
    </div>

    <div class="modal-overlay" id="modalOverlay"></div>

    <div class="modal" id="assignVolunteerModal">
        <div class="modal-header">
            <h3>Tugaskan Volunteer</h3>
            <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
            <label for="volunteerSelect">Pilih volunteer yang akan ditugaskan untuk permintaan ini:</label>
            <select id="volunteerSelect" class="form-control">
                <option value="" disabled selected>-- Pilih Volunteer --</option>
                <option value="andi_wijaya">Andi Wijaya</option>
                <option value="rina_melati">Rina Melati</option>
                <option value="doni_saputra">Doni Saputra</option>
                <option value="sari_kumala">Sari Kumala</option>
            </select>
        </div>
        <div class="modal-footer">
            <button class="btn-modal cancel">Batal</button>
            <button class="btn-modal confirm-assign">Simpan Penugasan</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalOverlay = document.getElementById('modalOverlay');
            const assignModal = document.getElementById('assignVolunteerModal');
            
            const assignButtons = document.querySelectorAll('.btn-action.assign');
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

            assignButtons.forEach(button => button.addEventListener('click', () => openModal(assignModal)));
            closeButtons.forEach(button => button.addEventListener('click', closeModal));
            cancelButtons.forEach(button => button.addEventListener('click', closeModal));
            modalOverlay.addEventListener('click', closeModal);

            // Logika untuk filter tabs (visual only)
            const tabButtons = document.querySelectorAll('.tab-btn');
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                });
            });
        });
    </script>

</body>
</html>