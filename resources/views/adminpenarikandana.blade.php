<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penarikan Dana - Admin KitaBantu</title>
    <link rel="stylesheet" href="{{ secure_asset('css/adminpenarikandana.css') }}">
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
                <a href="/admin/tarikdana" class="nav-item active">
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
                    <input type="text" placeholder="Cari nama atau campaign...">
                </div>
                <div class="admin-profile">
                    <div class="profile-info">
                        <p class="profile-name">Admin</p>
                        <p class="profile-role">Super Admin</p>
                    </div>
                    <img src="/img/adminicon.png" alt="Admin Avatar" class="profile-avatar">
                </div>
            </header>

            <section class="summary-grid">
                <div class="summary-card">
                    <div class="card-icon orange"><img src="/img/permintaanpending.png" alt=""></div>
                    <div class="card-info">
                        <p class="card-title">Permintaan Pending</p>
                        <p class="card-value">12</p>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="card-icon green"><img src="/img/totalcair.png" alt=""></div>
                    <div class="card-info">
                        <p class="card-title">Total Dicairkan (Bulan Ini)</p>
                        <p class="card-value">Rp56 Jt</p>
                    </div>
                </div>
            </section>

            <section class="widget list-widget">
                <div class="widget-header">
                    <h3>Request Penarikan Dana</h3>
                </div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Campaign</th>
                                <th>Pemilik</th>
                                <th>Saldo Campaign</th> 
                                <th>Nominal Penarikan</th>
                                <th>Rekening Tujuan</th>
                                <th>Tanggal Request</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bantu Renovasi Sekolah</td>
                                <td>Ahmad Winarno</td>
                                <td>Rp15.000.000</td>
                                <td>Rp5.000.000</td>
                                <td>BCA - 1234567890</td>
                                <td>28 Jun 2025</td>
                                <td><span class="status-tag pending">Pending</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-action detail">Detail</a>
                                        <button class="btn-action process">Proses</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pengobatan Ibu Siti</td>
                                <td>Yayasan Harapan Bunda</td>
                                <td>Rp20.000.000</td>
                                <td>Rp12.500.000</td>
                                <td>Mandiri - 0987654321</td>
                                <td>27 Jun 2025</td>
                                <td><span class="status-tag success">Diterima</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-action detail">Lihat Bukti</a>
                                    </div>
                                </td>
                            </tr>
                             <tr>
                                <td>Modal Warung Pak Budi</td>
                                <td>Eko Prasetyo</td>
                                <td>Rp1.500.000</td>
                                <td>Rp1.500.000</td>
                                <td>BRI - 555666777</td>
                                <td>26 Jun 2025</td>
                                <td><span class="status-tag rejected">Ditolak</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-action detail">Lihat Alasan</a>
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
                    <a href="#">&raquo;</a>
                </div>
            </section>
        </main>
    </div>

</body>
</html>