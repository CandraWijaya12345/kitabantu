<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>KitaBantu - Bantu Sesama Mencapai Kebahagiaan Utama</title>
    <link rel="stylesheet" href="css/globals.css" />
    <link rel="stylesheet" href="css/style.css" />
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
<div class="sign-up">
  <div class="signup-box">
    <h1 class="brand-title">KitaBantu</h1>
    <p class="welcome-text">Selamat Datang</p>
    <p class="subtitle-text">Daftar untuk mulai bantu sesama!</p>

    <form method="POST" action="{{ route('register') }}" class="form-wrapper">
        @csrf

        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" placeholder="Masukkan Nama Lengkap Anda" class="form-control" required autofocus value="{{ old('name') }}">
        @error('name')
            <span class="error-message">{{ $message }}</span>
        @enderror

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" class="form-control" required value="{{ old('email') }}">
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror

        <label for="password">Password</label>
        <div class="password-wrapper">
            <input type="password" id="password" name="password" placeholder="Masukkan Password" class="form-control" required>
            <img src="{{ asset('img/eye-slash.png') }}" alt="toggle visibility" class="eye-slash-outline" />
        </div>
        @error('password')
            <span class="error-message">{{ $message }}</span>
        @enderror

        <label for="password_confirmation">Konfirmasi Password</label>
        <div class="password-wrapper">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukkan Ulang Password" class="form-control" required>
            <img src="{{ asset('img/eye-slash.png') }}" alt="toggle visibility" class="eye-slash-outline" />
        </div>

        <button type="submit" class="login-button2">Daftar</button>

        <div class="terms">
          <input type="checkbox" id="terms" name="terms" required />
          <label for="terms">Dengan mengetuk “Daftar”, Anda setuju dengan <a href="#">Syarat dan Ketentuan Kitabantu.com</a></label>
        </div>

        <div class="login-link">
          <p>Sudah Punya Akun? <a href="{{ route('login') }}" class="register-link">Masuk</a></p>
        </div>
    </form>
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
  </body>
</html>