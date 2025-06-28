<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik - Admin KitaBantu</title>
    <link rel="stylesheet" href="/css/adminstatistik.css">
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
                <a href="/admin/statistik" class="nav-item active">
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

            <section class="page-header">
                <h1>Statistik & Laporan</h1>
                <div class="filter-controls">
                    <input type="date" id="start-date">
                    <span>-</span>
                    <input type="date" id="end-date">
                    <button class="btn-filter">Terapkan</button>
                </div>
            </section>

            <section class="summary-grid">
                <div class="summary-card">
                    <div class="card-icon blue"><img src="./img/icon-dana-white.png" alt=""></div>
                    <div class="card-info">
                        <p class="card-title">Total Pendapatan</p>
                        <p class="card-value">Rp350 Jt</p>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="card-icon green"><img src="./img/icon-campaign-white.png" alt=""></div>
                    <div class="card-info">
                        <p class="card-title">Campaign Berhasil</p>
                        <p class="card-value">128</p>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="card-icon orange"><img src="./img/icon-user-white.png" alt=""></div>
                    <div class="card-info">
                        <p class="card-title">Pendaftar Baru</p>
                        <p class="card-value">1,422</p>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="card-icon purple"><img src="./img/icon-donasi-white.png" alt=""></div>
                    <div class="card-info">
                        <p class="card-title">Total Transaksi</p>
                        <p class="card-value">5,689</p>
                    </div>
                </div>
            </section>

            <section class="charts-grid">
                <div class="widget chart-widget large">
                    <h3>Pertumbuhan Donasi (6 Bulan Terakhir)</h3>
                    <img src="./img/line-chart-placeholder.png" alt="Grafik Pertumbuhan Donasi" class="chart-placeholder">
                </div>
                <div class="widget chart-widget small">
                    <h3>Distribusi Kategori</h3>
                     <img src="./img/pie-chart-placeholder.png" alt="Grafik Distribusi Kategori" class="chart-placeholder">
                </div>
            </section>

        </main>
    </div>
</body>
</html>