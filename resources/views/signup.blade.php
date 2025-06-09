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
          <a href="#" class="nav-link">Galang Dana</a>
          <a href="#" class="nav-link">Donasi</a>
          <a href="#" class="nav-link">KitaTolong</a>
        </div>
        <div class="nav-section nav-center">
          <a href="#" class="logo">KitaBantu</a>
        </div>
        <div class="nav-section nav-right">
          <a href="#" class="nav-link">Tentang Kami</a>
          <a href="#" class="search-link">
            <img src="img/search.png" alt="Search" class="search-icon" />
            <span>Search</span>
          </a>
          <a href="/signin" class="login-button">Masuk</a>
        </div>
      </nav>
    </header>

<main>
<div class="sign-up">
  <div class="signup-box">
    <h1 class="brand-title">KitaBantu</h1>
    <p class="welcome-text">Selamat Datang</p>
    <p class="subtitle-text">Daftar untuk mulai bantu sesama!</p>

    <form action="/signup" method="POST" class="form-wrapper">
      <label for="fullname">Nama Lengkap</label>
      <input type="text" id="fullname" name="fullname" placeholder="Masukkan Nama Lengkap Anda" class="form-control" required />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" class="form-control" required />

      <label for="password">Password</label>
      <div class="password-wrapper">
        <input type="password" id="password" name="password" placeholder="Masukkan Password" class="form-control" required />
        <img src="img/eye-slash.png" alt="toggle visibility" class="eye-slash-outline" />
      </div>

      <label for="confirm-password">Konfirmasi Password</label>
      <div class="password-wrapper">
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Masukkan Ulang Password" class="form-control" required />
        <img src="img/eye-slash.png" alt="toggle visibility" class="eye-slash-outline" />
      </div>

      <button type="submit" class="login-button2">Daftar</button>

      <div class="terms">
        <input type="checkbox" id="terms" required />
        <label for="terms">Dengan mengetuk “Daftar”, Anda setuju dengan <a href="#">Syarat dan Ketentuan Kitabantu.com</a></label>
      </div>
      <div class="login-link">
        <p>Sudah Punya Akun? <a href="/signin" class="register-link">Masuk</a></p>
      </div>
    </form>
  </div>
</div>
</main>

    <footer class="footer">
      <div class="footer-content">
        <div class="footer-section">
          <h3 class="footer-logo">KitaBantu</h3>
          <p class="footer-description">
            KitaBantu adalah website crowdfunding sebagai penyalur bantuan kepada yang membutuhkan, kapanpun dan dimanapun.
          </p>
        </div>
        <div class="footer-section">
          <h3 class="footer-title">Menu</h3>
          <ul class="footer-links">
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Donasi</a></li>
            <li><a href="#">Galang Dana</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Kontak Kami</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h3 class="footer-title">Kontak</h3>
          <ul class="footer-contact">
            <li><a href="mailto:kitabantu@gmail.com">kitabantu@gmail.com</a></li>
            <li><a href="tel:082222222222">082 222 222 222</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h3 class="footer-title">FAQ</h3>
          <ul class="faq-list">
            <li class="faq-item"><button class="faq-question">Question 1 <span>↓</span></button></li>
            <li class="faq-item"><button class="faq-question">Question 2 <span>↓</span></button></li>
            <li class="faq-item"><button class="faq-question">Question 3 <span>↓</span></button></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p class="copyright">Copyright © 2025 KitaBantu</p>
        <button class="chat-button">
          <span>1 Message Arrived</span>
        </button>
      </div>
    </footer>
  </body>
</html>