<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Campaign - KitaBantu</title>
    {{-- Pastikan path CSS sudah benar --}}
    <link rel="stylesheet" href="{{ asset('css/donate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search_campaign.css') }}">
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
                <a href="{{ route('campaigns.search') }}" class="search-link">
                    <img src="{{ asset('img/search.png') }}" alt="Search Icon" class="search-icon">
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
    
    <main class="list-main">
        <div class="list-container">
            <div class="search-header">
                <h1 class="page-title">Cari Campaign</h1>
                <p class="section-description">
                    Pilih campaign yang ingin anda berikan bantuan, seluruh bantuan anda sangat berharga bagi mereka.
                </p>
                
                {{-- FORM PENCARIAN DINAMIS --}}
                <form action="{{ route('campaigns.search') }}" method="GET" class="search-form">
                    <input type="text" name="query" placeholder="Cari judul atau isi campaign..." value="{{ $searchQuery ?? '' }}">
                    <button type="submit">
                        <img src="{{ asset('img/search_white.png') }}" alt="Search">
                    </button>
                </form>
            </div>

            {{-- HASIL PENCARIAN DINAMIS --}}
            <div class="campaign-grid">
                @forelse ($campaigns as $campaign)
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
                    <div class="no-results-message">
                        @if (!empty($searchQuery))
                            <p>Campaign dengan kata kunci "<strong>{{ $searchQuery }}</strong>" tidak ditemukan.</p>
                        @else
                            <p>Silakan masukkan kata kunci untuk memulai pencarian.</p>
                        @endif
                    </div>
                @endforelse
            </div>
        </div>
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
            <button class="chat-button"><img src="./img/message.png" alt="chat icon"><span>1 Message Arrived</span></button>
        </div>
    </footer>
    </div>

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