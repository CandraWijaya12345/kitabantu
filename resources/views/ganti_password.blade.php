<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password - KitaBantu</title>
    <link rel="stylesheet" href="css/ganti_password.css"> 
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
                <a href="#" class="search-link">
                    <img src="./img/search.png" alt="Search Icon" class="search-icon">
                    Search
                </a>
                <a href="/signin" class="login-button">Masuk</a>
            </div>
        </nav>
    </header>
    
        <main class="profile-main">
            <div class="profile-container">
                <aside class="profile-sidebar">
                    <nav class="profile-nav">
                        <a href="#" class="profile-nav-link">Informasi Pengguna</a>
                        <a href="#" class="profile-nav-link active">Ganti Password</a>
                        <a href="#" class="profile-nav-link">Campaign Saya</a>
                        <a href="#" class="profile-nav-link">Permintaan KamiTolong</a>
                    </nav>
                </aside>

                <section class="profile-content">
                    <div class="form-card">
                        <h1 class="form-title">Ganti Password</h1>
                        <form>
                            <div class="form-group">
                                <label for="old-password">Masukkan Password Lama</label>
                                <input type="password" id="old-password" placeholder="Password Lama">
                            </div>
                            <div class="form-group">
                                <label for="new-password">Masukkan Password Baru</label>
                                <input type="password" id="new-password" placeholder="Password Baru">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Konfirmasi Password Baru</label>
                                <input type="password" id="confirm-password" placeholder="Ulangi Password Baru">
                            </div>
                            
                            <button type="submit" class="submit-button">Simpan Perubahan</button>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    
        <footer class="footer">
            <div class="footer-content">
                <div class="footer-section">
                    <h3 class="footer-logo">KitaBantu</h3>
                    <p class="footer-description">Kitabantu adalah website crowdfunding sebagai penyalur bantuan kepada yang membutuhkan, kapanpun dan dimanapun.</p>
                </div>
                <div class="footer-section">
                    <h4 class="footer-title">Menu</h4>
                    <ul class="footer-links">
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Donasi</a></li>
                        <li><a href="#">Galang Dana</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                     <h4 class="footer-title">Kontak</h4>
                     <ul class="footer-contact">
                        <li><img src="./img/email-icon.png" alt="Email"> kitabantu@gmail.com</li>
                        <li><img src="./img/phone-icon.png" alt="Phone"> 082 222 222 222</li>
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
                <button class="chat-button"><img src="./img/chat-icon.png" alt="chat icon"><span>1 Message Arrived</span></button>
            </div>
        </footer>
    </div>

</body>
</html>