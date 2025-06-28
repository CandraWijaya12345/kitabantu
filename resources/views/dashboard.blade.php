<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - KitaBantu</title>
    <link rel="stylesheet" href="/css/admindashboard.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="logo">KitaBantu</a>
            </div>
            <nav class="sidebar-nav">
                <a href="/admin/dashboard" class="nav-item active">
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
                    <input type="text" placeholder="Cari...">
                </div>
                <div class="admin-profile">
                    <div class="profile-info">
                        <p class="profile-name">Admin</p>
                        <p class="profile-role">Super Admin</p>
                    </div>
                    <img src="./img/admin-avatar.png" alt="Admin Avatar" class="profile-avatar">
                </div>
            </header>

            <section class="dashboard-overview">
                <h2>Selamat Datang Kembali!</h2>
                <div class="summary-grid">
                    <div class="summary-card">
                        <div class="card-icon blue"><img src="./img/icon-campaign-white.png" alt=""></div>
                        <div class="card-info">
                            <p class="card-title">Total Campaign Aktif</p>
                            <p class="card-value">75</p>
                        </div>
                    </div>
                    <div class="summary-card">
                        <div class="card-icon green"><img src="./img/icon-donasi-white.png" alt=""></div>
                        <div class="card-info">
                            <p class="card-title">Total Donasi Hari Ini</p>
                            <p class="card-value">1,230</p>
                        </div>
                    </div>
                    <div class="summary-card">
                        <div class="card-icon orange"><img src="./img/icon-dana-white.png" alt=""></div>
                        <div class="card-info">
                            <p class="card-title">Dana Terkumpul</p>
                            <p class="card-value">Rp27,1 Jt</p>
                        </div>
                    </div>
                    <div class="summary-card">
                        <div class="card-icon purple"><img src="./img/icon-user-white.png" alt=""></div>
                        <div class="card-info">
                            <p class="card-title">User Baru Terdaftar</p>
                            <p class="card-value">45</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="dashboard-details">
                <div class="widget chart-widget">
                    <h3>Statistik Campaign</h3>
                    <img src="./img/chart-placeholder.png" alt="Grafik Statistik Campaign" class="chart-placeholder">
                </div>
                <div class="widget activity-widget">
                    <h3>Campaign Baru</h3>
                    <ul class="activity-list">
                        <li class="activity-item">
                            <div class="activity-info">
                                <p class="activity-title">Bantu Renovasi Sekolah Tepian Negeri</p>
                                <p class="activity-category">Kategori: Pendidikan</p>
                            </div>
                            <a href="#" class="btn-tinjau">Tinjau</a>
                        </li>
                         <li class="activity-item">
                            <div class="activity-info">
                                <p class="activity-title">Pengobatan Kanker untuk Ibu Siti</p>
                                <p class="activity-category">Kategori: Kesehatan</p>
                            </div>
                            <a href="#" class="btn-tinjau">Tinjau</a>
                        </li>
                         <li class="activity-item">
                            <div class="activity-info">
                                <p class="activity-title">Modal Usaha untuk Warung Pak Budi</p>
                                <p class="activity-category">Kategori: UMKM</p>
                            </div>
                           <a href="#" class="btn-tinjau">Tinjau</a>
                        </li>
                    </ul>
                </div>
            </section>
        </main>
    </div>
</body>
</html>