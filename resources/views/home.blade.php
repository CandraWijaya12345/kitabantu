<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KitaBantu - Crowdfunding Untuk Kebaikan</title>
    <link rel="stylesheet" href="css/home.css">
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
        <section class="home-hero">
            <div class="hero-content">
                <h1 class="hero-title">Bantu Sesama Mencapai Kebahagiaan Utama</h1>
                <p class="hero-description">Donasi ke pihak membutuhkan, kini mudah, aman, dan transparan melalui KitaBantu.</p>
                <a href="/donate" class="cta-button">Mari Memberi</a>
            </div>
            <div class="hero-image">
                <img src="./img/donasi.jpg" alt="Orang-orang berbagi dalam kegiatan sosial">
            </div>
        </section>

        <section class="campaigns">
            <h2 class="section-title">MariBantu</h2>
            <p class="section-description">Bantuan anda sangat diperlukan. Uluran tangan anda, kebahagiaan untuk mereka.</p>
            <div class="campaign-grid">       
                @forelse ($campaigns as $campaign)
                    {{-- Loop ini akan mengulang untuk setiap data campaign dari database --}}
                    <a href="#" class="campaign-card">
                        <div class="campaign-top-info">
                            <span>Rp{{ number_format($campaign->dana_terkumpul) }} Terkumpul</span>
                        </div>
                        <img src="{{ asset('storage/' . $campaign->gambar_url) }}" alt="{{ $campaign->judul }}" class="campaign-image">
                        <div class="campaign-content">
                            <h3 class="campaign-title">{{ $campaign->judul }}</h3>
                            <div class="campaign-progress">
                                @php
                                    // Menghindari pembagian dengan nol jika target dana adalah 0
                                    $persentase = $campaign->target_dana > 0 ? ($campaign->dana_terkumpul / $campaign->target_dana) * 100 : 0;
                                @endphp
                                <div class="progress-bar"><div class="progress" style="width: {{ min($persentase, 100) }}%;"></div></div>
                            </div>
                            <div class="campaign-details">
                                <div class="campaign-target">
                                    <span>Dibutuhkan</span><br>
                                    <strong>Rp{{ number_format($campaign->target_dana) }}</strong>
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
                    {{-- Teks ini akan muncul jika tidak ada campaign aktif di database --}}
                    <div class="no-campaign">
                        <p>Belum ada campaign yang tersedia saat ini.</p>
                    </div>
                @endforelse

            </div>
            <a href="/donate" class="view-more-button">Lihat Selengkapnya</a>
        </section>

        <section class="about">
            <div class="about-image">
                <img src="./img/kitabantu_donations_orang.png" alt="Pria memegang kotak donasi">
            </div>
            <div class="about-content">
                <h2 class="about-title">Apa Itu KitaBantu?</h2>
                <p class="about-description">Kitabantu adalah aplikasi yang diciptakan untuk mewujudkan impian bagi yang membutuhkan. Kitabantu menjadi wadah penyedia bantuan dalam penggalangan dana secara online, dapat dilakukan kapanpun dan dimanapun.</p>
                <p class="about-link">Ingin tahu lebih detail tentang Kitabantu? <a href="/detail">Klik disini</a></p>
            </div>
        </section>

        <div class="impact-stats-wrapper">
            <section class="impact">
                <h2 class="impact-title">Bantuan Tersampaikan</h2>
                <p class="impact-description">
                    <span class="impact-number">12345678</span> Orang terbantu berkat anda dan akan terus bertambah. Mari berikan yang terbaik untuk mereka yang membutuhkan.
                </p>
            </section>
            <section class="stats home-stats">
                <div class="stat-card">
                    <div class="stat-icon"><img src="./img/icon-dana.png" alt="Dana Terkumpul"></div>
                    <p class="stat-number">Rp250.000.000</p>
                    <p class="stat-label">Dana terkumpul</p>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><img src="./img/icon-orang.png" alt="Orang Terdaftar"></div>
                    <p class="stat-number">123.456.789</p>
                    <p class="stat-label">Orang Terdaftar</p>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><img src="./img/icon-campaign.png" alt="Campaign Dibuat"></div>
                    <p class="stat-number">12.345</p>
                    <p class="stat-label">Campaign Dibuat</p>
                </div>
                 <div class="stat-card">
                    <div class="stat-icon"><img src="./img/icon-donasi.png" alt="Donasi Dilakukan"></div>
                    <p class="stat-number">12.345</p>
                    <p class="stat-label">Donasi Dilakukan</p>
                </div>
            </section>
        </div>

        <section class="features">
             <div class="features-content">
                <div class="features-image">
                    <img src="./img/tangan_kamitolong.png" alt="Dua tangan saling menjangkau">
                </div>
                <div class="features-text-content">
                    <h2 class="features-title">KitaTolong Hadir Membantu Rekan Sesama!</h2>
                    <p class="features-description">Hubungi tim KitaBantu apabila Anda mengalami hal yang darurat dan perlu pertolongan. KitaTolong akan dengan sigap, tanggap, dan cepat membantu rekan sesama.</p>
                    <ul class="features-list">
                        <li class="feature-item">
                            <span class="checkmark"></span> 100% Bebas Biaya
                        </li>
                        <li class="feature-item">
                            <span class="checkmark"></span> 100% Aman dan Terjaga
                        </li>
                    </ul>
                    <a href="/formkitatolong" class="cta-button">Coba KitaTolong Sekarang</a>
                </div>
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
            <button class="chat-button"><img src="./img/message.png" alt="chat icon"><span>1 Message Arrived</span></button>
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