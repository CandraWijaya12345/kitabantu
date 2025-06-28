<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Campaign - KitaBantu</title>
    <link rel="stylesheet" href="/css/admincampaign.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="logo">KitaBantu</a>
            </div>
            <nav class="sidebar-nav">
                <a href="#" class="nav-item">
                    <img src="./img/icon-dashboard.png" alt="" class="nav-icon">
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-item active"> <img src="./img/icon-campaign.png" alt="" class="nav-icon">
                    <span>Campaign</span>
                </a>
                <a href="#" class="nav-item">
                    <img src="./img/icon-donasi.png" alt="" class="nav-icon">
                    <span>Donasi</span>
                </a>
                <a href="#" class="nav-item">
                    <img src="./img/icon-user.png" alt="" class="nav-icon">
                    <span>User</span>
                </a>
                <a href="#" class="nav-item">
                    <img src="./img/icon-verifikasi.png" alt="" class="nav-icon">
                    <span>Verifikasi Campaign</span>
                </a>
                 <a href="#" class="nav-item">
                    <img src="./img/icon-statistik.png" alt="" class="nav-icon">
                    <span>Statistik</span>
                </a>
                 <a href="#" class="nav-item">
                    <img src="./img/icon-pengaturan.png" alt="" class="nav-icon">
                    <span>Pengaturan</span>
                </a>
                 <a href="#" class="nav-item">
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
                <div class="widget-header">
                    <h3>List Campaign</h3>
                    <a href="#" class="btn-add">+ Tambah Campaign</a>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Judul Campaign</th>
                                <th>Kategori</th>
                                <th>Dana Terkumpul</th>
                                <th>Target Dana</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bantu Renovasi Sekolah Tepian Negeri</td>
                                <td>Pendidikan</td>
                                <td>Rp5.500.000</td>
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
                                <td>Pengobatan Kanker untuk Ibu Siti</td>
                                <td>Kesehatan</td>
                                <td>Rp12.750.000</td>
                                <td>Rp100.000.000</td>
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
                                <td>Rp2.100.000</td>
                                <td>Rp5.000.000</td>
                                <td><span class="status-tag pending">Menunggu Verifikasi</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-edit">Edit</a>
                                        <a href="#" class="btn-delete">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                             <tr>
                                <td>Pembangunan Masjid Al-Hidayah</td>
                                <td>Infrastruktur</td>
                                <td>Rp150.200.000</td>
                                <td>Rp500.000.000</td>
                                <td><span class="status-tag active">Aktif</span></td>
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
                    <a href="#">3</a>
                    <a href="#">&raquo;</a>
                </div>
            </section>

        </main>
    </div>
</body>
</html>