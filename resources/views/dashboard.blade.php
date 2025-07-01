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
                    <img src="/img/dashboardadmin.png" alt="" class="nav-icon">
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
                <a href="/admin/kitatolong" class="nav-item">
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
                    <input type="text" placeholder="Cari...">
                </div>
                <div class="admin-profile">
                    <div class="profile-info">
                        <p class="profile-name">Admin</p>
                        <p class="profile-role">Super Admin</p>
                    </div>
                    <img src="/img/adminicon.png" alt="Admin Avatar" class="profile-avatar">
                </div>
            </header>

            <section class="dashboard-overview">
                <h2>Selamat Datang Kembali!</h2>
                <div class="summary-grid">
                    <div class="summary-card">
                        <div class="card-icon blue"><img src="/img/campaigntotal.png" alt=""></div>
                        <div class="card-info">
                            <p class="card-title">Total Campaign Aktif</p>
                            <p class="card-value">75</p>
                        </div>
                    </div>
                    <div class="summary-card">
                        <div class="card-icon green"><img src="/img/donasihariiniicon.png" alt=""></div>
                        <div class="card-info">
                            <p class="card-title">Total Donasi Hari Ini</p>
                            <p class="card-value">1,230</p>
                        </div>
                    </div>
                    <div class="summary-card">
                        <div class="card-icon orange"><img src="/img/danaterkumpulicon.png" alt=""></div>
                        <div class="card-info">
                            <p class="card-title">Dana Terkumpul</p>
                            <p class="card-value">Rp27,1 Jt</p>
                        </div>
                    </div>
                    <div class="summary-card">
                        <div class="card-icon purple"><img src="/img/userbaruicon.png" alt=""></div>
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
                    <img src="/img/statistikiconn.png" alt="Grafik Statistik Campaign" class="chart-placeholder">
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