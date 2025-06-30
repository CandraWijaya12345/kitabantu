<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - KitaBantu</title>
    <link rel="stylesheet" href="css/globals.css">
    <link rel="stylesheet" href="css/contactus.css">
</head>
<body>

    <header class="header">
        <nav class="nav">
            <div class="nav-section nav-left">
                <a href="/formdonasi" class="nav-link">Galang Dana</a>
                <a href="/donate" class="nav-link">Donasi</a>
                <a href="/formkitatolong" class="nav-link">KitaTolong</a>
            </div>
            <div class="nav-section">
                <a href="/home" class="logo">KitaBantu</a>
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

    <main class="contact-main">
        <div class="contact-container">
            <div class="contact-header">
                <h1>Hubungi Kami</h1>
                <p>Jika masih ada pertanyaan yang ingin disampaikan, kritik, maupun saran, hubungi kami melalui informasi kontak di bawah ini</p>
            </div>

            <div class="contact-cards-grid">
                <div class="contact-card">
                    <img src="./img/pesan.png" alt="Email Icon" class="contact-icon">
                    <h2 class="contact-title">Email</h2>
                    <p class="contact-info">kitabantu@gmail.com</p>
                </div>
                <div class="contact-card">
                    <img src="./img/telpon.png" alt="Telepon Icon" class="contact-icon">
                    <h2 class="contact-title">Telepon</h2>
                    <p class="contact-info">+6282 222 222 222</p>
                </div>
            </div>

            <div class="contact-buttons">
                <a href="#" class="contact-button primary">Hubungi Kami</a>
                <a href="#" class="contact-button secondary">Chat via Whatsapp</a>
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