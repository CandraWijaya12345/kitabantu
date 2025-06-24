<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pertolongan - KitaBantu</title>
    <link rel="stylesheet" href="css/formkitatolong.css"> 
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
        <section class="kitatolong-hero">
            <div class="hero-content">
                <h1>Selamat Datang di KitaTolong</h1>
                <p>Kami siap membantu Anda terkait masalah yang Anda hadapi, kapanpun dan dimanapun</p>
            </div>
            <div class="hero-image">
                <img src="./img/kitatolong.png" alt="Pria memberikan gestur OK">
            </div>
        </section>

        <section class="kitatolong-form-section">
            <form class="kitatolong-form">
                <div class="form-card">
                    <h2 class="form-card-title">Pilih Kategori Pertolongan</h2>
                    <div class="category-grid">
                        <button type="button" class="category-button">Menjaga Posko</button>
                        <button type="button" class="category-button">Distribusi Logistik</button>
                        <button type="button" class="category-button">Evakuasi Barang</button>
                        <button type="button" class="category-button">Pencatatan</button>
                        <button type="button" class="category-button">Pembersihan Area Bencana</button>
                        <button type="button" class="category-button">Pendamping</button>
                        <button type="button" class="category-button">Pengantaran Lansia</button>
                        <button type="button" class="category-button">Mengurus Dokumen</button>
                    </div>

                    <div class="form-group">
                        <label for="help-detail">Jelaskan dengan detail perihal pertolongan yang anda butuhkan</label>
                        <input type="text" id="help-detail" placeholder="Saya membutuhkan...">
                    </div>

                    <div class="form-group">
                        <label for="help-date">Tentukan tanggal permintaan pertolongan (Minimal H-3 Permintaan)</label>
                        <input type="date" id="help-date">
                    </div>

                    <div class="form-group">
                        <label>Tentukan Rentang Waktu Permintaan Pertolongan</label>
                        <div class="time-range-group">
                           <input type="time" id="help-time-start" aria-label="Jam Mulai">
                           <span>-</span>
                           <input type="time" id="help-time-end" aria-label="Jam Selesai">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="help-location">Tentukan Lokasi Permintaan Pertolongan</label>
                        <input type="text" id="help-location" placeholder="Alamat lengkap">
                    </div>
                </div>

                <div class="form-card">
                    <h2 class="form-card-title">Data Pengirim</h2>
                     <div class="form-group">
                        <label for="sender-name">Nama Lengkap (Sesuai KTP)</label>
                        <input type="text" id="sender-name" placeholder="Nama Lengkap (Sesuai KTP)">
                    </div>
                     <div class="form-group">
                        <label for="sender-contact">Nomor Ponsel atau Email (Opsional)</label>
                        <input type="text" id="sender-contact" placeholder="Nomor Ponsel atau Email (Opsional)">
                    </div>
                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="terms-1">
                        <label for="terms-1">Dengan ini menyetujui syarat dan ketentuan penggunaan KitaTolong.</label>
                    </div>
                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="terms-2">
                        <label for="terms-2">Menyatakan identitas saya asli dan siap ditindak lanjuti apabila melanggar peraturan yang berlaku.</label>
                    </div>
                </div>

                <div class="action-buttons">
                    <button type="submit" class="action-button primary">Kirim Permintaan</button>
                    <button type="button" class="action-button secondary">Cek Status Permintaan</button>
                </div>
            </form>
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
                <button class="chat-button"><img src="./img/message.png" alt="chat icon"><span>1 Message Arrived</span></button>
            </div>
        </footer>

</body>
</html>