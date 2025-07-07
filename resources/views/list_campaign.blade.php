<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaign Saya - KitaBantu</title>
    {{-- Menggunakan CSS yang sama dengan list_kitatolong untuk referensi --}}
    <link rel="stylesheet" href="{{ asset('css/list_kitatolong.css') }}">
    <style>
        /* CSS tambahan untuk status campaign */
        .status-badge { text-transform: capitalize; padding: 5px 12px; border-radius: 20px; color: white; font-weight: 600; font-size: 0.8rem; }
        .status-aktif { background-color: #5cb85c; }
        .status-pending { background-color: #f0ad4e; }
        .status-selesai { background-color: #5bc0de; }
        .status-ditolak { background-color: #d9534f; }
    </style>
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
    
    <main class="list-main">
        <div class="list-container">
            <h1 class="list-title">Daftar Campaign Galang Dana Anda</h1>

            {{-- Loop melalui setiap campaign milik pengguna --}}
            @forelse ($campaigns as $campaign)
                <div class="request-card">
                    <div class="card-header">
                        {{-- Tampilkan Judul Campaign --}}
                        <h2>{{ $campaign->judul }}</h2>
                        
                        {{-- Tampilkan Status Campaign --}}
                        <span class="status-badge status-{{ strtolower($campaign->status) }}">
                            Status: {{ $campaign->status }}
                        </span>
                    </div>
                    <div class="card-body">
                        {{-- Info Dana Terkumpul vs Target --}}
                        <div class="info-box-full">
                            <strong>Rp{{ number_format($campaign->dana_terkumpul, 0, ',', '.') }}</strong> terkumpul dari target Rp{{ number_format($campaign->target_dana, 0, ',', '.') }}
                        </div>
                        <div class="info-box-grid">
                            {{-- Info Tanggal Dibuat --}}
                            <div class="info-box-half">
                                Dibuat: {{ $campaign->created_at->format('d/m/Y') }}
                            </div>
                            {{-- Info Batas Waktu --}}
                            <div class="info-box-half">
                                Batas Waktu: {{ \Carbon\Carbon::parse($campaign->batas_waktu)->format('d/m/Y') }}
                            </div>
                        </div>
                         {{-- Link untuk melihat atau mengedit campaign --}}
                        <div class="info-box-full" style="background-color: #eaf4ff; text-align:center;">
                            <a href="{{ route('donate.menu', $campaign->slug) }}" class="status-link" style="text-decoration: none; color: #304e7b;">Lihat Campaign Publik</a>
                            {{-- Anda bisa menambahkan link edit di sini nanti: <a href="#">Edit Campaign</a> --}}
                        </div>
                    </div>
                </div>
            @empty
                {{-- Pesan ini akan muncul jika user belum membuat campaign --}}
                <div class="request-card">
                    <p style="text-align: center; padding: 2rem;">
                        Anda belum pernah membuat campaign galang dana. <br>
                        <a href="{{ route('campaigns.create') }}" style="color: #5893ea; font-weight: 600;">Buat campaign baru sekarang!</a>
                    </p>
                </div>
            @endforelse
            
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