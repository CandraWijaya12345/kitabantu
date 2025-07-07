<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - KitaBantu</title>
    <link rel="stylesheet" href="{{ asset('css/admindashboard.css') }}">
    {{-- TAMBAHKAN SCRIPT LIBRARY CHART.JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                {{-- Form Logout --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                <a href="/login" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-item logout">
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
                        <p class="profile-name">{{ Auth::user()->name }}</p>
                        <p class="profile-role">{{ Auth::user()->role }}</p>
                    </div>
                    <img src="/img/adminicon.png" alt="Admin Avatar" class="profile-avatar">
                </div>
            </header>

            <section class="dashboard-overview">
                <h2>Selamat Datang Kembali!</h2>
                <div class="summary-grid">
                    {{-- KARTU 1: Total Campaign Aktif --}}
                    <div class="summary-card">
                        <div class="card-icon blue"><img src="/img/campaigntotal.png" alt=""></div>
                        <div class="card-info">
                            <p class="card-title">Total Campaign Aktif</p>
                            <p class="card-value">{{ $total_active_campaigns }}</p>
                        </div>
                    </div>
                    {{-- KARTU 2: Total Donasi Hari Ini --}}
                    <div class="summary-card">
                        <div class="card-icon green"><img src="/img/donasihariiniicon.png" alt=""></div>
                        <div class="card-info">
                            <p class="card-title">Total Donasi Hari Ini</p>
                            <p class="card-value">{{ number_format($donations_today_count) }}</p>
                        </div>
                    </div>
                    {{-- KARTU 3: Dana Terkumpul --}}
                    <div class="summary-card">
                        <div class="card-icon orange"><img src="/img/danaterkumpulicon.png" alt=""></div>
                        <div class="card-info">
                            <p class="card-title">Dana Terkumpul</p>
                            <p class="card-value">Rp{{ number_format($total_funds_raised, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    {{-- KARTU 4: User Baru --}}
                    <div class="summary-card">
                        <div class="card-icon purple"><img src="/img/userbaruicon.png" alt=""></div>
                        <div class="card-info">
                            <p class="card-title">User Baru Hari Ini</p>
                            <p class="card-value">{{ $new_users_today_count }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="dashboard-details">
                <div class="widget chart-widget">
                    <h3>Campaign Dibuat (7 Hari Terakhir)</h3>
                    {{-- Di sini grafik akan digambar oleh JavaScript --}}
                    <canvas id="campaignChart"></canvas>
                </div>
                <div class="widget activity-widget">
                    <h3>Campaign Baru (Perlu Tinjauan)</h3>
                    <ul class="activity-list">
                        @forelse($pending_campaigns as $campaign)
                            <li class="activity-item">
                                <div class="activity-info">
                                    <p class="activity-title">{{ \Illuminate\Support\Str::limit($campaign->judul, 35) }}</p>
                                    <p class="activity-category">Kategori: {{ $campaign->kategori }}</p>
                                </div>
                                <a href="#" class="btn-tinjau">Tinjau</a>
                            </li>
                        @empty
                            <li class="activity-item"><p>Tidak ada campaign baru yang perlu ditinjau.</p></li>
                        @endforelse
                    </ul>
                </div>
            </section>
        </main>
    </div>

    {{-- TAMBAHKAN SCRIPT DI BAWAH INI --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('campaignChart');

    // Mengambil data dari controller yang sudah di-format sebagai JSON
    const chartLabels = @json($chartLabels);
    const chartData = @json($chartData);

    new Chart(ctx, {
        type: 'bar', // Jenis grafik: bar, line, pie, dll.
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Campaign Baru',
                data: chartData,
                backgroundColor: 'rgba(88, 147, 234, 0.5)',
                borderColor: 'rgba(88, 147, 234, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        // Memastikan sumbu Y hanya menampilkan angka bulat
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Menyembunyikan legenda di atas
                }
            }
        }
    });
});
</script>

</body>
</html>