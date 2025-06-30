<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi - Bantu Ahmad - KitaBantu</title>
    <link rel="stylesheet" href="css/globals.css">
    <link rel="stylesheet" href="css/donatemenu.css">
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

    <main>
        <section class="donate-section">
            <div class="donate-container">
                <div class="donate-left-column">
                    <h1 class="donate-title">Bantu Pak Ahmad dalam Mencapai Cita-Citanya akan Kesembuhan Adiknya dari Kanker</h1>
                    <div class="donate-image-wrapper">
                        <img src="./img/donasi.jpg" alt="Kegiatan donasi">
                    </div>
                    <div class="donate-buttons">
                        <a href="#" class="donate-button primary">Donasi Sekarang</a>
                        <a href="#" class="donate-button secondary">Bagikan ke yang lain</a>
                    </div>
                </div>

                <div class="donate-right-column">
                    <div class="fundraising-details">
                        <div class="fundraising-amount">
                            <span class="raised">Rp250,000</span>
                            <span class="target">dari target Rp 15,000,000</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 1.6%;"></div>
                        </div>
                        <p class="fundraising-summary">
                            Pak Ahmad seorang kakak yang ingin adiknya selamat dari kanker sejak 1995
                        </p>
                        <div class="donor-info">
                            <img src="./img/eye.png" alt="Donatur">
                            <span class="donor-count">1212121212</span>
                            <span class="donor-location">
                                <img src="./img/lokasi.png" alt="Lokasi">
                                Bali
                            </span>
                        </div>
                    </div>

                    <div class="fundraiser-profile">
                        <img src="./img/person.png" alt="Avatar Ahmad Winarno" class="fundraiser-avatar">
                        <div class="fundraiser-info">
                            <h3 class="fundraiser-name">Ahmad Winarno</h3>
                            <p class="fundraiser-role">Penggalang Dana</p>
                        </div>
                    </div>

                    <div class="campaign-story">
                        <p>Kisah/cerita penggalang dana. Lorem ipsum dolor sit amet consectetur. Non massa aliquam sed enim arcu quisque. Vitae auctor magna consectetur purus sit at ultrices. Tincidunt aenean congue aenean augue consequat pharetra sed netus. Felis phasellus venenatis duis bibendum porttitor. Lorem ipsum dolor sit amet consectetur. Non massa aliquam sed enim arcu quisque. Vitae auctor magna consectetur purus sit at ultrices. Tincidunt aenean congue aenean augue consequat pharetra sed netus. Felis phasellus venenatis duis bibendum porttitor. Lorem ipsum dolor sit amet consectetur. Non massa aliquam sed enim arcu quisque. Vitae auctor magna consectetur purus sit at ultrices. Tincidunt aenean congue aenean augue consequat pharetra sed netus. Felis phasellus venenatis duis bibendum porttitor.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="donor-support-section">
            <div class="donor-support-container">
                <h2>Dukungan Donatur</h2>
                <div class="donor-comment">
                    <img src="./img/person.png" alt="Avatar Donatur" class="commenter-avatar">
                    <div class="comment-content">
                        <h4 class="commenter-name">Ahmad Winarno</h4>
                        <p class="comment-date">24-06-2024 • 19:40</p>
                        <p class="comment-text">Anjay mabar gws yah. Lorem ipsum dolor sit amet consectetur. Non massa aliquam sed enim arcu quisque. Vitae auctor magna consectetur purus sit at ultrices.</p>
                    </div>
                </div>
                <div class="donor-comment">
                    <img src="./img/person.png" alt="Avatar Donatur" class="commenter-avatar">
                    <div class="comment-content">
                        <h4 class="commenter-name">Ahmad Winarno</h4>
                        <p class="comment-date">24-06-2024 • 19:40</p>
                        <p class="comment-text">Anjay mabar gws yah. Lorem ipsum dolor sit amet consectetur. Non massa aliquam sed enim arcu quisque. Vitae auctor magna consectetur purus sit at ultrices.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <button class="floating-chat-button">
        <img src="./img/message.png" alt="chat icon">
        <span>1 Message Arrived</span>
    </button>

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