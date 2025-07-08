<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik - Admin KitaBantu</title>
    <link rel="stylesheet" href="{{ secure_asset('css/adminstatistik.css') }}">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="logo">KitaBantu</a>
            </div>
            <nav class="sidebar-nav">
                <a href="/admin/dashboard" class="nav-item ">
                    <img src="/img/dashboardadmin.png" alt="Dashboard Icon" class="nav-icon">
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
                <a href="/admin/statistik" class="nav-item active">
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
                    <div class="card-icon blue"><img src="/img/totalsemuaicon.png" alt=""></div>
                    <div class="card-info">
                        <p class="card-title">Total Pendapatan</p>
                        <p class="card-value">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="card-icon green"><img src="/img/campaignberhasil.png" alt=""></div>
                    <div class="card-info">
                        <p class="card-title">Campaign Berhasil</p>
                        <p class="card-value">{{ $campaignBerhasil }}</p>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="card-icon orange"><img src="/img/userbaruicon.png" alt=""></div>
                    <div class="card-info">
                        <p class="card-title">Total User</p>
                        <p class="card-value">{{ number_format($totalUser, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="card-icon purple"><img src="/img/totaltransaksi.png" alt=""></div>
                    <div class="card-info">
                        <p class="card-title">Total Transaksi</p>
                        <p class="card-value">{{ number_format($totalTransaksi, 0, ',', '.') }}</p>
                    </div>
                </div>
            </section>
            <section class="charts-grid">
                <div class="widget chart-widget large">
                    <h3>Pertumbuhan Donasi (6 Bulan Terakhir)</h3>
                    <canvas id="donasiChart"></canvas>
                </div>
                <div class="widget chart-widget small">
                    <h3>Distribusi Kategori</h3>
                     <canvas id="kategoriChart"></canvas>
                </div>
            </section>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctxDonasi = document.getElementById('donasiChart').getContext('2d');
            const donasiChart = new Chart(ctxDonasi, {
                type: 'line',
                data: {
                    labels: {!! json_encode($donasiBulanan->pluck('bulan')) !!},
                    datasets: [{
                        label: 'Total Donasi',
                        data: {!! json_encode($donasiBulanan->pluck('jumlah_transaksi')) !!},
                        borderColor: '#4e73df',
                        backgroundColor: 'rgba(78, 115, 223, 0.1)',
                        borderWidth: 2
                    }]
                }
            });

            const ctxKategori = document.getElementById('kategoriChart').getContext('2d');
            const kategoriChart = new Chart(ctxKategori, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($kategoriDistribusi->pluck('kategori')) !!},
                    datasets: [{
                        data: {!! json_encode($kategoriDistribusi->pluck('total')) !!},
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796']
                    }]
                }
            });
        </script>

</body>
</html>