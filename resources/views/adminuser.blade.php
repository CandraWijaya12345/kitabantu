<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User - KitaBantu</title>
    <link rel="stylesheet" href="/css/adminuser.css">
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
                <a href="/admin/user" class="nav-item active">
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
                    <input type="text" placeholder="Cari nama atau email user...">
                </div>
                <div class="admin-profile">
                    <div class="profile-info">
                        <p class="profile-name">Admin</p>
                        <p class="profile-role">Super Admin</p>
                    </div>
                    <img src="./img/admin-avatar.png" alt="Admin Avatar" class="profile-avatar">
                </div>
            </header>

            <section class="user-summary">
                <div class="summary-card">
                    <div class="card-icon green">
                        <img src="./img/icon-user-online.png" alt="">
                    </div>
                    <div class="card-info">
                        <p class="card-title">User Sedang Login</p>
                        <p class="card-value">1,234</p>
                    </div>
                </div>
            </section>

            <section class="widget list-widget">
                <div class="widget-header">
                    <h3>Data Pengguna Terdaftar</h3>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Terakhir Login</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Budi Santoso</td>
                                <td>budi.s@email.com</td>
                                <td>28 Jun 2025, 14:05</td>
                                <td><span class="status-tag online">Online</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-detail">Lihat Detail</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Citra Lestari</td>
                                <td>citra.lestari@email.com</td>
                                <td>28 Jun 2025, 11:30</td>
                                <td><span class="status-tag offline">Offline</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-detail">Lihat Detail</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Eko Prasetyo</td>
                                <td>eko.pras@email.com</td>
                                <td>27 Jun 2025, 20:15</td>
                                <td><span class="status-tag offline">Offline</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-detail">Lihat Detail</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Dewi Anggraini</td>
                                <td>dewi.a@email.com</td>
                                <td>28 Jun 2025, 14:02</td>
                                <td><span class="status-tag online">Online</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-detail">Lihat Detail</a>
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