<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih - KitaBantu</title>
    <link rel="stylesheet" href="{{ asset('css/globals.css') }}">
    <style>
        .thank-you-container { text-align: center; padding: 5rem 2rem; max-width: 700px; margin: 80px auto; background: #fff; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .thank-you-container h1 { font-size: 2.5rem; color: #304e7b; margin-bottom: 1rem; }
        .thank-you-container p { font-size: 1.2rem; margin-bottom: 2rem; }
        .thank-you-container a { padding: 0.8rem 2rem; background-color: #5893ea; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; }
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

    <div class="thank-you-container">
        <h1>Terima Kasih, Donatur!</h1>
        <p>Donasi Anda telah kami catat. Kebaikan Anda sangat berarti bagi mereka yang membutuhkan.</p>
        <a href="{{ route('home') }}">Kembali ke Beranda</a>
    </div>

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

</body>
</html>