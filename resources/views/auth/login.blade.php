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
                <a href="/signin" class="login-button">Masuk</a>
            </div>
        </nav>
    </header>

<main>
  <div class="sign-in">
    <div class="login-box">
      <h2 class="brand-title">KitaBantu</h2>
      <p class="welcome-text">Selamat Datang</p>
      <p class="subtitle-text">Masuk untuk mulai bantu sesama!</p>

      <form method="POST" action="{{ route('login') }}" class="form-wrapper">
    
          @csrf
          <div>
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email Anda" required autofocus>
              
              @error('email')
                  <span class="error-message">{{ $message }}</span>
              @enderror
          </div>

          <div style="margin-top: 1rem;">
              <label for="password">Password</label>
              <div class="password-wrapper">
                  <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                  <img class="eye-slash-outline" src="{{ asset('img/eye-slash.png') }}" alt="toggle visibility">
              </div>
          </div>

          <button type="submit" class="login-button2">Masuk</button>

        <div class="form-footer">
          <div class="forgot-password">
            <a href="#">Lupa Password?</a>
          </div>
          <div class="register-link">
            Belum Punya Akun? <a href="/signup">Daftar</a>
          </div>
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