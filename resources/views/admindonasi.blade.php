<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Donasi - KitaBantu</title>
    <link rel="stylesheet" href="/css/admindonasi.css">
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
                <a href="/admin/donasi" class="nav-item active">
                    <img src="./img/icon-donasi.png" alt="" class="nav-icon">
                    <span>Donasi</span>
                </a>
                <a href="/admin/user" class="nav-item">
                    <img src="./img/icon-user.png" alt="" class="nav-icon">
                    <span>User</span>
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
                    <input type="text" placeholder="Cari donasi atau nama user...">
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
                    <h3>Riwayat Donasi</h3>
                    </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama Donatur</th>
                                <th>Judul Campaign</th>
                                <th>Jumlah Donasi</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Budi Santoso</td>
                                <td>Bantu Renovasi Sekolah Tepian Negeri</td>
                                <td>Rp100.000</td>
                                <td><span class="status-tag success">Berhasil</span></td>
                                <td>28 Jun 2025</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-detail">Detail</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Citra Lestari</td>
                                <td>Pengobatan Kanker untuk Ibu Siti</td>
                                <td>Rp250.000</td>
                                <td><span class="status-tag success">Berhasil</span></td>
                                <td>28 Jun 2025</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-detail">Detail</a>
                                    </div>
                                </td>
                            </tr>
                             <tr>
                                <td>Donatur Anonim</td>
                                <td>Modal Usaha untuk Warung Pak Budi</td>
                                <td>Rp50.000</td>
                                <td><span class="status-tag pending">Tertunda</span></td>
                                <td>27 Jun 2025</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-detail">Detail</a>
                                    </div>
                                </td>
                            </tr>
                             <tr>
                                <td>Eko Prasetyo</td>
                                <td>Pembangunan Masjid Al-Hidayah</td>
                                <td>Rp500.000</td>
                                <td><span class="status-tag failed">Gagal</span></td>
                                <td>27 Jun 2025</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-detail">Detail</a>
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
                    <a href="#">3</a>
                    <a href="#">&raquo;</a>
                </div>
            </section>

        </main>
    </div>
</body>
</html>