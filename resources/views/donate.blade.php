<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Donasi - KitaBantu</title>
    <link rel="stylesheet" href="css/globals.css"> 
    <link rel="stylesheet" href="css/donate.css"> 
</head>

<body>
    <header class="header">
        <nav class="nav">
            <div class="nav-section nav-left">
                <a href="{{ route('campaigns.create') }}" class="nav-link">Galang Dana</a>
                <a href="/donate" class="nav-link">Donasi</a>
                <a href="/formkitatolong" class="nav-link">KitaTolong</a>
            </div>
            <div class="nav-section">
                <a href="/" class="logo">KitaBantu</a>
            </div>
            <div class="nav-section nav-right">
                <a href="/detail" class="nav-link">Tentang Kami</a>
                <a href="/search_campaign" class="search-link">
                    <img src="./img/search.png" alt="Search Icon" class="search-icon">
                    Search
                </a>
                
                @auth
                    <div class="user-dropdown">
                        <button class="user-button" id="userDropdownButton">
                            <span>{{ Auth::user()->name }}</span>
                            <img src="{{ asset('img/arrow-down-dark.png') }}" class="dropdown-arrow" alt="arrow">
                        </button>
                        <div class="dropdown-menu" id="userDropdownMenu">
                            <a href="/user">Profil Saya</a>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/login" class="login-button">Masuk</a>
                @endguest
            </div>
        </nav>
    </header>
    
    <main>
        <section class="campaigns list-donasi-page">
        <div class="list-header">
            <div class="list-header-content">
                <p class="page-subtitle">MariBantu</p>
                <h1 class="page-title">Donasi Sekarang</h1>
                <p class="section-description">
                    Mereka butuh uluran tangan kita. Karena sedikit bantuan dari kita adalah harapan besar bagi mereka.
                </p>
            </div>

            {{-- GANTI TOMBOL LAMA DENGAN FORM INI --}}
            <form action="{{ route('donate.index') }}" method="GET" class="sort-form">
                <select name="sort" class="sort-dropdown" onchange="this.form.submit()">
                    <option value="terbaru" {{ $sortOption == 'terbaru' ? 'selected' : '' }}>
                        Urutkan: Terbaru
                    </option>
                    <option value="akan_berakhir" {{ $sortOption == 'akan_berakhir' ? 'selected' : '' }}>
                        Urutkan: Akan Berakhir
                    </option>
                    <option value="paling_lama" {{ $sortOption == 'paling_lama' ? 'selected' : '' }}>
                        Urutkan: Paling Lama
                    </option>
                </select>
            </form>
            
        </div>

        <div class="campaign-grid">
                
            @forelse ($campaigns as $campaign)
                {{-- PERBAIKAN ADA DI BARIS DI BAWAH INI --}}
                <a href="{{ route('donate.menu', $campaign->slug) }}" class="campaign-card">
                    <div class="campaign-top-info">
                        <span>Rp{{ number_format($campaign->dana_terkumpul, 0, ',', '.') }} Terkumpul</span>
                    </div>
                    <img src="{{ asset('storage/' . $campaign->gambar_url) }}" alt="{{ $campaign->judul }}" class="campaign-image">
                    <div class="campaign-content">
                        <h3 class="campaign-title">{{ $campaign->judul }}</h3>
                        <div class="campaign-progress">
                            @php
                                $persentase = $campaign->target_dana > 0 ? ($campaign->dana_terkumpul / $campaign->target_dana) * 100 : 0;
                            @endphp
                            <div class="progress-bar"><div class="progress" style="width: {{ min($persentase, 100) }}%;"></div></div>
                        </div>
                        <div class="campaign-details">
                            <div class="campaign-target">
                                <span>Dibutuhkan</span><br>
                                <strong>Rp{{ number_format($campaign->target_dana, 0, ',', '.') }}</strong>
                            </div>
                            <div class="campaign-time-left">
                                <span>Tersisa</span><br>
                                <strong>{{ \Carbon\Carbon::parse($campaign->batas_waktu)->diffForHumans() }}</strong>
                            </div>
                        </div>
                        <div class="campaign-organizer">
                            <img src="{{ asset('img/user-icon.png') }}" alt="User Icon">
                            <span>{{ $campaign->user->name ?? 'Penggalang Dana' }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="no-campaign-message" style="text-align: center; grid-column: 1 / -1; padding: 3rem 0;">
                    <p>Belum ada campaign yang tersedia saat ini.</p>
                </div>
            @endforelse

        </div>

        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3 class="footer-logo">KitaBantu</h3>
                <p class="footer-description">Kitabantu adalah website crowdfunding untuk berdonasi dan menggalang dana untuk orang yang membutuhkan, kapanpun dan dimanapun.</p>
            </div>
            <div class="footer-section">
                <h4 class="footer-title">Menu</h4>
                <ul class="footer-links">
                    <li><a href="/detail">Tentang Kami</a></li>
                    <li><a href="/donate">Donasi</a></li>
                    <li><a href="/formdonate">Galang Dana</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="/contactus">Kontak Kami</a></li>
                </ul>
            </div>
            <div class="footer-section">
                 <h4 class="footer-title">Kontak</h4>
                 <ul class="footer-contact">
                    <li><img src="./img/message.png" alt="Email"> kitabantu@gmail.com</li>
                    <li><img src="./img/call.png" alt="Phone"> 082 222 222 222</li>
                 </ul>
            </div>
            <div class="footer-section">
                <h4 class="footer-title">FAQ</h4>
                <ul class="faq-list">
                    <li class="faq-item"><button class="faq-question"><span>Question 1</span><img src="./img/arrow-down.png" alt="arrow" class="faq-icon"></button></li>
                    <li class="faq-item"><button class="faq-question"><span>Question 2</span><img src="./img/arrow-down.png" alt="arrow" class="faq-icon"></button></li>
                    <li class="faq-item"><button class="faq-question"><span>Question 3</span><img src="./img/arrow-down.png" alt="arrow" class="faq-icon"></button></li>
                </ul>
            </div>
        </div>
            <div class="footer-bottom">
                <p class="copyright">Copyright © 2025 Kitabantu</p>
            </div>
    </footer>

        <script>
    document.addEventListener('DOMContentLoaded', function() {
        const userDropdownButton = document.getElementById('userDropdownButton');
        const userDropdownMenu = document.getElementById('userDropdownMenu');

        if (userDropdownButton) {
            userDropdownButton.addEventListener('click', function(event) {
                // Mencegah event lain yang mungkin terjadi
                event.stopPropagation();
                
                // Toggle (tampilkan/sembunyikan) menu dropdown
                userDropdownMenu.classList.toggle('show');
                
                // Toggle rotasi panah
                this.classList.toggle('active');
            });
        }

        // Menutup dropdown jika user mengklik di luar area dropdown
        window.addEventListener('click', function(event) {
            if (userDropdownMenu && userDropdownMenu.classList.contains('show')) {
                // Cek apakah klik terjadi di luar area dropdown
                if (!userDropdownButton.contains(event.target)) {
                    userDropdownMenu.classList.remove('show');
                    userDropdownButton.classList.remove('active');
                }
            }
        });
    });
    </script>
</body>
</html>