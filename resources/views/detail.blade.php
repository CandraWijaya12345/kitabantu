<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kampanye - KitaBantu</title>
    <link rel="stylesheet" href="css/globals.css">
    <link rel="stylesheet" href="css/detail.css">
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
        <section class="detail-hero">
            <div class="detail-hero-content">
                <h1 class="detail-hero-title">Kami Percaya Semua Orang Bisa Saling Bantu</h1>
                <div class="detail-hero-card">
                    <h2>Apa Itu KitaBantu?</h2>
                    <p>KitaBantu adalah platform crowdfunding yang memudahkan siapa saja untuk menggalang dan menyalurkan donasi secara online. Dengan mengusung semangat gotong royong, kami hadir sebagai jembatan antara mereka yang membutuhkan dan para donatur yang ingin membantu, melalui proses yang aman, transparan, dan mudah.</p>
                </div>
            </div>
            <div class="detail-hero-image">
                <img src="./img/volunteerr.png" alt="Relawan mengemas donasi">
            </div>
        </section>

        <section class="how-it-works">
            <h2 class="section-title">Cara Kerja KitaBantu</h2>
            <div class="how-it-works-grid">
                <div class="how-it-works-card">
                    <img src="./img/icon-buat-kampanye.png" alt="Buat Kampanye" class="how-it-works-icon">
                    <h3>Buat Kampanye</h3>
                </div>
                <div class="how-it-works-card">
                    <img src="./img/icon-sebarkan-kampanye.png" alt="Sebarkan Kampanye" class="how-it-works-icon">
                    <h3>Sebarkan Kampanye</h3>
                </div>
                <div class="how-it-works-card">
                    <img src="./img/icon-kumpulkan-donasi.png" alt="Kumpulkan Donasi" class="how-it-works-icon">
                    <h3>Kumpulkan Donasi</h3>
                </div>
                <div class="how-it-works-card">
                    <img src="./img/icon-cairkan-dana.png" alt="Cairkan Dana" class="how-it-works-icon">
                    <h3>Cairkan Dana</h3>
                </div>
            </div>
        </section>
        
        <section class="campaigns detail-campaigns">
            <div class="campaign-header">
                <h2 class="section-title">Kampanye Berhasil</h2>
                <p class="total-raised">Total Dana Terkumpul: <strong>Rp{{ number_format($totalDana ?? 0, 0, ',', '.') }}</strong></p>

            </div>
            <div class="campaign-grid">
                @forelse ($campaigns as $campaign)
                    <div class="campaign-card">
                        <div class="campaign-top-info">
                            <span>Rp<span class="amount">{{ number_format($campaign->dana_terkumpul ?? 0) }}</span> Terkumpul</span>
                        </div>
                        <img src="{{ asset('storage/' . $campaign->gambar_url) }}" alt="{{ $campaign->judul }}" class="campaign-image">
                        <div class="campaign-content">
                            <h3 class="campaign-title">{{ $campaign->judul }}</h3>
                            <div class="campaign-progress">
                                @php
                                    $persen = $campaign->target_dana > 0 ? ($campaign->dana_terkumpul / $campaign->target_dana) * 100 : 0;
                                @endphp
                                <div class="progress-bar">
                                    <div class="progress" style="width: {{ min($persen, 100) }}%;"></div>
                                </div>
                            </div>
                            <div class="campaign-details">
                                <div class="campaign-target">
                                    <span>Dibutuhkan</span><br>
                                    <strong>Rp {{ number_format($campaign->target_dana) }}</strong>
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
                    </div>
                @empty
                    <p>Tidak ada campaign yang tersedia.</p>
                @endforelse
            </div>

        </section>

        <section class="main-cta">
            <h2>Siap Membantu Sesama?</h2>
            <div class="main-cta-buttons">
                <a href="/donate" class="cta-button primary">Donasi Sekarang</a>
                
                <button id="openShareModalButton" class="cta-button secondary">Bagikan ke yang lain</button>
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
    <div class="modal-overlay" id="shareModalOverlay"></div>
        <div class="share-modal" id="shareModal">
            <div class="share-modal-header">
                <h2>Bagikan</h2>
                <button class="close-modal" id="closeShareModalButton">&times;</button>
            </div>
            <div class="share-modal-body">
                <p class="share-subtitle">Bagikan campaign ini ke teman-teman Anda</p>
                <div class="social-icons-grid">
                    <a href="#" class="social-icon-link">
                        <img src="./img/icon-whatsapp.png" alt="WhatsApp">
                        <span>WhatsApp</span>
                    </a>
                    <a href="#" class="social-icon-link">
                        <img src="./img/icon-facebook-color.png" alt="Facebook">
                        <span>Facebook</span>
                    </a>
                    <a href="#" class="social-icon-link">
                        <img src="./img/icon-twitter-color.png" alt="X/Twitter">
                        <span>X</span>
                    </a>
                    <a href="#" class="social-icon-link">
                        <img src="./img/icon-email-color.png" alt="Email">
                        <span>Email</span>
                    </a>
                </div>
                <div class="copy-link-container">
                    <input type="text" id="shareableLink" value="{{ url()->current() }}" readonly>
                    <button id="copyLinkButton">Copy</button>
                </div>
            </div>
        </div>

    <div id="copyNotification" class="notification">
            Link berhasil disalin ke clipboard!
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

    document.addEventListener('DOMContentLoaded', function() {
        
        // Elemen Notifikasi
        const notification = document.getElementById('copyNotification');

        // Elemen Modal Berbagi
        const shareModalOverlay = document.getElementById('shareModalOverlay');
        const shareModal = document.getElementById('shareModal');
        const openShareModalButton = document.getElementById('openShareModalButton');
        const closeShareModalButton = document.getElementById('closeShareModalButton');

        // Elemen di dalam Modal
        const copyLinkButton = document.getElementById('copyLinkButton');
        const shareableLinkInput = document.getElementById('shareableLink');

        // Fungsi untuk membuka modal
        function openModal() {
            if (shareModal) {
                shareModalOverlay.classList.add('show');
                shareModal.classList.add('show');
            }
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            if (shareModal) {
                shareModalOverlay.classList.remove('show');
                shareModal.classList.remove('show');
            }
        }

        // Event listener untuk tombol utama "Bagikan"
        if (openShareModalButton) {
            openShareModalButton.addEventListener('click', openModal);
        }

        // Event listener untuk tombol close (X) dan overlay
        if (closeShareModalButton) {
            closeShareModalButton.addEventListener('click', closeModal);
        }
        if (shareModalOverlay) {
            shareModalOverlay.addEventListener('click', closeModal);
        }
        
        // Event listener untuk tombol "Copy" di dalam modal
        if (copyLinkButton) {
            copyLinkButton.addEventListener('click', function() {
                const linkToCopy = shareableLinkInput.value;

                navigator.clipboard.writeText(linkToCopy).then(function() {
                    // Tampilkan notifikasi "berhasil disalin"
                    notification.textContent = 'Link berhasil disalin!';
                    notification.classList.add('show');

                    // Sembunyikan notifikasi setelah 3 detik
                    setTimeout(function() {
                        notification.classList.remove('show');
                    }, 3000);
                    
                }).catch(function(err) {
                    console.error('Gagal menyalin link: ', err);
                });
            });
        }
    });

    </script>
</body>
</html>