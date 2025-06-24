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
                    <button type="button" class="nominal-button" data-value="5000">Rp 5,000</button>
                    <button type="button" class="nominal-button" data-value="10000">Rp 10,000</button>
                    <button type="button" class="nominal-button" data-value="25000">Rp 25,000</button>
                    <button type="button" class="nominal-button" data-value="50000">Rp 50,000</button>
                    <button type="button" class="nominal-button" data-value="100000">Rp 100,000</button>
                    <button type="button" class="nominal-button" data-value="500000">Rp 500,000</button>
                </div>
                <p class="custom-amount-label">atau nominal donasi lainnya (Masukkan dalam kelipatan ribuan)</p>
                <div class="custom-amount-input">
                    <span>Rp</span>
                    <input type="number" id="customAmount" placeholder="0">
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
                <div class="form-group">
                    <label for="supportMessage">Sertakan doa dan Dukungan (Opsional)</label>
                    <textarea id="supportMessage" placeholder="Tulis doa dan dukungan untuk penggalangan dana" maxlength="500"></textarea>
                    <div id="charCounter" class="char-counter">500 karakter tersisa</div>
                </div>
            </div>
            
            <div class="form-section-card">
                <h3>Pilih Metode Pembayaran</h3>
                <div class="payment-grid">
                    <button type="button" class="payment-option-button active" data-value="qris">
                        <img src="./img/qris-logo.png" alt="QRIS">
                    </button>
                    <button type="button" class="payment-option-button" data-value="bca-va">
                        <img src="./img/bca-logo.jpeg" alt="BCA Virtual Account">
                    </button>
                    <button type="button" class="payment-option-button" data-value="mandiri-va">
                        <img src="./img/mandiri-logo.png" alt="Mandiri Virtual Account">
                    </button>
                     <button type="button" class="payment-option-button" data-value="briva">
                        <img src="./img/bri-logo.jpg" alt="BRI Virtual Account (BRIVA)">
                    </button>
                    <button type="button" class="payment-option-button" data-value="gopay">
                        <img src="./img/gopay-logo.png" alt="GoPay">
                    </button>
                </div>
            </div>

            <button type="submit" id="payButton" class="submit-donation-button">Bayar Sekarang</button>

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
        document.addEventListener('DOMContentLoaded', function () {
            // ... logika nominal dan character counter ...
            
            // ===== LOGIKA BARU UNTUK PILIHAN PEMBAYARAN =====
            const paymentButtons = document.querySelectorAll('.payment-option-button');
            let selectedPaymentMethod = 'qris'; // Default ke qris karena 'active' di HTML

            paymentButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Hapus kelas 'active' dari semua tombol pembayaran
                    paymentButtons.forEach(btn => btn.classList.remove('active'));
                    // Tambahkan kelas 'active' ke tombol yang diklik
                    button.classList.add('active');
                    // Simpan metode pembayaran yang dipilih
                    selectedPaymentMethod = button.dataset.value;
                    console.log('Metode Pembayaran Dipilih:', selectedPaymentMethod); // Untuk testing
                });
            });

            // ===== LOGIKA LAMA YANG MASIH RELEVAN =====
            const nominalButtons = document.querySelectorAll('.nominal-button');
            const customAmountInput = document.getElementById('customAmount');
            const payButton = document.getElementById('payButton');
            let selectedAmount = 0;

            function updatePaymentButton() {
                if (selectedAmount > 0) {
                    const formattedAmount = new Intl.NumberFormat('id-ID').format(selectedAmount);
                    payButton.textContent = `Bayar Donasi Rp ${formattedAmount}`;
                } else {
                    payButton.textContent = 'Bayar Sekarang';
                }
            }

            nominalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    nominalButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    selectedAmount = parseInt(button.dataset.value, 10);
                    customAmountInput.value = '';
                    updatePaymentButton();
                });
            });

            customAmountInput.addEventListener('input', () => {
                nominalButtons.forEach(btn => btn.classList.remove('active'));
                selectedAmount = parseInt(customAmountInput.value, 10) || 0;
                updatePaymentButton();
            });

            const messageInput = document.getElementById('supportMessage');
            const charCounter = document.getElementById('charCounter');
            const maxLength = messageInput.getAttribute('maxlength');

            messageInput.addEventListener('input', () => {
                const remaining = maxLength - messageInput.value.length;
                charCounter.textContent = `${remaining} karakter tersisa`;
            });
        });
    </script>

</body>
</html>