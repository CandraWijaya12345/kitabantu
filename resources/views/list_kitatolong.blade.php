<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Permintaan KitaTolong - KitaBantu</title>
    <link rel="stylesheet" href="css/list_kitatolong.css">
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
            <h1 class="list-title">Berikut merupakan daftar permintaan KitaTolong Anda</h1>

            {{-- Loop melalui setiap permintaan pertolongan --}}
            @forelse ($helpRequests as $request)
                <div class="request-card">
                    <div class="card-header">
                        {{-- Tampilkan Kategori --}}
                        <h2>Permintaan {{ $request->kategori }}</h2>
                        {{-- Tampilkan Status dengan class dinamis --}}
                        <span class="status-link status-{{ strtolower($request->status) }}">
                            Status : {{ $request->status }}
                        </span>
                    </div>
                    <div class="card-body">
                        {{-- Tampilkan Detail Pertolongan --}}
                        <div class="info-box-full">
                            {{ $request->detail_pertolongan }}
                        </div>
                        <div class="info-box-grid">
                            {{-- Tampilkan Tanggal (diformat) --}}
                            <div class="info-box-half">
                                {{ \Carbon\Carbon::parse($request->tanggal_pertolongan)->format('d/m/Y') }}
                            </div>
                            {{-- Tampilkan Rentang Waktu (diformat) --}}
                            <div class="info-box-half">
                                {{ \Carbon\Carbon::parse($request->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($request->waktu_selesai)->format('H:i') }}
                            </div>
                        </div>
                        {{-- Tampilkan Lokasi --}}
                        <div class="info-box-full">
                            {{ $request->lokasi }}
                        </div>
                    </div>
                </div>
            @empty
                {{-- Pesan ini akan muncul jika tidak ada permintaan sama sekali --}}
                <div class="request-card">
                    <p style="text-align: center; padding: 2rem;">
                        Anda belum pernah membuat permintaan KitaTolong. <br>
                        <a href="{{ route('kitatolong.create') }}" style="color: #5893ea; font-weight: 600;">Buat permintaan baru sekarang!</a>
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