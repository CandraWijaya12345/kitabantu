<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Donasi - KitaBantu</title>
    <link rel="stylesheet" href="css/formdonasi.css">
</head>
<body>

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

    <main class="form-main-content">
        <div class="form-container">
            <div class="form-header">
                <h1>Kamu Akan Berdonasi</h1>
                <p>Mereka butuh uluran tangan kita. Karena sedikit bantuan dari kita adalah harapan besar bagi mereka.</p>
            </div>

            <div class="campaign-summary-card">
                <img src="./img/donasi_image.png" alt="Campaign Image" class="campaign-summary-img">
                <div class="campaign-summary-details">
                    <h2 class="campaign-summary-title">Bantu Pak Ahmad dalam Mencapai Cita-Citanya akan Kesembuhan Adiknya dari Kanker</h2>
                    <p class="campaign-summary-organizer">Pak Ahmad seorang kakak yang ingin adiknya selamat dari kanker sejak 1995</p>
                    <div class="progress-bar">
                        <div class="progress" style="width: 1.6%;"></div>
                    </div>
                    <div class="fundraising-info">
                        <span>Terkumpul <strong>Rp250,000</strong></span>
                        <span class="target">dari target Rp 15,000,000</span>
                    </div>
                    <div class="time-left">
                        <span>Tersisa <strong>7 Hari Lagi</strong></span>
                    </div>
                    <div class="fundraiser-profile-small">
                        <img src="./img/person.png" alt="Avatar">
                        <span>Ahmad Winarno</span>
                    </div>
                </div>
            </div>

            <div class="form-section-card">
                <h3>Pilih Nominal Donasi</h3>
                <div class="nominal-grid">
                    <button class="nominal-button">Rp 5,000</button>
                    <button class="nominal-button">Rp 10,000</button>
                    <button class="nominal-button">Rp 25,000</button>
                    <button class="nominal-button">Rp 50,000</button>
                    <button class="nominal-button">Rp 100,000</button>
                    <button class="nominal-button">Rp 500,000</button>
                </div>
                <p class="custom-amount-label">atau nominal donasi lainnya (Masukkan dalam kelipatan ribuan)</p>
                <div class="custom-amount-input">
                    <span>Rp</span>
                    <input type="text" value="0" placeholder="0">
                </div>
            </div>

            <div class="form-section-card">
                <h3>Data Donatur</h3>
                <div class="form-group">
                    <label for="fullName">Nama Lengkap</label>
                    <input type="text" id="fullName" placeholder="Nama Lengkap">
                </div>
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="anonymous">
                    <label for="anonymous">Sembunyikan nama saya (donasi sebagai anonim)</label>
                </div>
                <div class="form-group">
                    <label for="contact">Nomor Ponsel atau Email (Opsional)</label>
                    <input type="text" id="contact" placeholder="Nomor Ponsel atau Email (Opsional)">
                </div>
            </div>

            <div class="form-section-card">
                <h3>Sertakan doa dan Dukungan (Opsional)</h3>
                <textarea placeholder="Tulis doa dan dukungan untuk penggalangan dana"></textarea>
            </div>
            
            <div class="form-section-card payment-method">
                <h3>Pilih Metode Pembayaran</h3>
                <img src="./img/qris-logo.png" alt="QRIS Logo">
            </div>

            <button class="submit-donation-button">Bayar Sekarang</button>

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

</body>
</html>