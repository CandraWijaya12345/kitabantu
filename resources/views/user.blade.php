<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - KitaBantu</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>

    <div class="page-container">
        <header class="header">
            <nav class="nav">
                <div class="nav-section nav-left">
                    <a href="#" class="nav-link">Galang Dana</a>
                    <a href="#" class="nav-link">Donasi</a>
                    <a href="#" class="nav-link">KitaTolong</a>
                </div>
                <div class="nav-section">
                    <a href="#" class="logo">KitaBantu</a>
                </div>
                <div class="nav-section nav-right">
                    <a href="#" class="nav-link">Tentang Kami</a>
                    <a href="#" class="search-link">
                        <img src="./img/search.png" alt="Search Icon" class="search-icon">
                        Search
                    </a>
                    <a href="#" class="login-button">Masuk</a>
                </div>
            </nav>
        </header>
    
        <main class="profile-main">
            <div class="profile-container">
                <aside class="profile-sidebar">
                    <nav class="profile-nav">
                        <a href="#" class="profile-nav-link active">Informasi Pengguna</a>
                        <a href="#" class="profile-nav-link">Ganti Password</a>
                        <a href="#" class="profile-nav-link">Campaign Saya</a>
                        <a href="#" class="profile-nav-link">Permintaan KamiTolong</a>
                    </nav>
                </aside>

                <section class="profile-content">
                    <div class="form-card">
                        <h1 class="form-title">Profil Saya</h1>
                        <form>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" id="name" placeholder="Nama lengkap pengguna">
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Tanggal lahir</label>
                                <div class="date-input-wrapper">
                                    <input type="text" id="birthdate" placeholder="DD/MM/YY">
                                    <img src="./img/calendar-icon.png" alt="Calendar Icon" class="input-icon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="gender-options">
                                    <button type="button" class="gender-button">Laki-laki</button>
                                    <button type="button" class="gender-button active">Perempuan</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor Handphone</label>
                                <input type="tel" id="phone" placeholder="08XXXXXXXXXX">
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea id="address" placeholder="Masukkan Alamat"></textarea>
                            </div>
                             <div class="form-group">
                                <label for="bio">Deskripsi Diri</label>
                                <textarea id="bio" placeholder="Deskripsikan Diri Anda"></textarea>
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
    </div>

</body>
</html>