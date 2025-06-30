<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penarikan Dana - KitaBantu</title>
    <link rel="stylesheet" href="css/tarikdana.css">
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
    
        <main class="form-main">
            <div class="form-container">
                <div class="form-header">
                    <h1>Penarikan Dana</h1>
                    <p>Galang dana lebih mudah, mulai dari sini, jadilah alasan mereka tersenyum hari ini!</p>
                </div>

                <div class="info-card">
                    <div class="saldo-info">
                        <p>Saldo Tersedia</p>
                        <strong>Rp250.000</strong>
                    </div>
                    <div class="campaign-info">
                        <img src="./img/donasi_image.png" alt="Campaign Image">
                        <p>Bantu Pak Ahmad dalam Mencapai Cita-Citanya akan Kesembuhan Adiknya dari Kanker</p>
                    </div>
                </div>

                <form class="withdrawal-form">
                    <div class="form-group">
                        <label for="amount">Tentukan Jumlah Penarikan Dana</label>
                        <div class="nominal-grid">
                            <button type="button" class="nominal-button" data-value="50000">Rp 50.000</button>
                            <button type="button" class="nominal-button" data-value="100000">Rp 100.000</button>
                            <button type="button" class="nominal-button" data-value="1000000">Rp 1.000.000</button>
                            <button type="button" class="nominal-button" data-value="10000000">Rp 10.000.000</button>
                        </div>
                         <div class="custom-amount-input">
                            <span>Rp</span>
                            <input type="number" id="amount" placeholder="Masukkan Jumlah Lain">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title">Judul Penarikan Dana</label>
                        <input type="text" id="title" placeholder="Contoh: Pembelian obat kemoterapi tahap 2">
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsikan Alasan Anda Melakukan Penarikan Dana</label>
                        <textarea id="description" rows="5" placeholder="Jelaskan secara rinci penggunaan dana yang akan ditarik"></textarea>
                    </div>
                    
                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="terms-1">
                        <label for="terms-1">Pemilik rekening bertanggung jawab atas penggunaan dana yang diterima dari galang dana ini.</label>
                    </div>
                     <div class="form-group checkbox-group">
                        <input type="checkbox" id="terms-2">
                        <label for="terms-2">Sebagai Penerima dana bertanggung jawab atas mengirimkan Laporan pencairan dan pelaporan penggunaan dana.</label>
                    </div>

                    <button type="submit" class="submit-button">Tarik Dana Sekarang</button>
                </form>

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
        document.addEventListener('DOMContentLoaded', function() {
            const amountButtons = document.querySelectorAll('.nominal-button');
            const customAmountInput = document.getElementById('amount');

            amountButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Set nilai input custom dari tombol yang diklik
                    customAmountInput.value = this.dataset.value;

                    // Beri style 'active' pada tombol yang diklik
                    amountButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Hapus style 'active' jika pengguna mengetik manual
            customAmountInput.addEventListener('input', function() {
                amountButtons.forEach(btn => btn.classList.remove('active'));
            });
        });

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