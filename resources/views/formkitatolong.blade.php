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
            {{-- Tambahkan action, method, dan @csrf --}}
            <form class="kitatolong-form" action="{{ route('kitatolong.store') }}" method="POST">
                @csrf

                {{-- Menampilkan pesan error validasi --}}
                @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="form-card">
                    <h2 class="form-card-title">Pilih Kategori Pertolongan</h2>
                    <div class="category-grid">
                        {{-- Ganti <button> menjadi <input type="radio"> dan <label> --}}
                        <input type="radio" id="cat1" name="kategori" value="Menjaga Posko"><label for="cat1" class="category-button">Menjaga Posko</label>
                        <input type="radio" id="cat2" name="kategori" value="Distribusi Logistik"><label for="cat2" class="category-button">Distribusi Logistik</label>
                        <input type="radio" id="cat3" name="kategori" value="Evakuasi Barang"><label for="cat3" class="category-button">Evakuasi Barang</label>
                        <input type="radio" id="cat4" name="kategori" value="Pencatatan"><label for="cat4" class="category-button">Pencatatan</label>
                        <input type="radio" id="cat5" name="kategori" value="Pembersihan Area Bencana"><label for="cat5" class="category-button">Pembersihan Area Bencana</label>
                        <input type="radio" id="cat6" name="kategori" value="Pendamping"><label for="cat6" class="category-button">Pendamping</label>
                        <input type="radio" id="cat7" name="kategori" value="Pengantaran Lansia"><label for="cat7" class="category-button">Pengantaran Lansia</label>
                        <input type="radio" id="cat8" name="kategori" value="Mengurus Dokumen"><label for="cat8" class="category-button">Mengurus Dokumen</label>
                    </div>

                    <div class="form-group">
                        <label for="help-detail">Jelaskan dengan detail perihal pertolongan yang anda butuhkan</label>
                        {{-- Tambahkan name dan old() --}}
                        <input type="text" id="help-detail" name="detail_pertolongan" placeholder="Saya membutuhkan..." value="{{ old('detail_pertolongan') }}">
                    </div>

                    <div class="form-group">
                        <label for="help-date">Tentukan tanggal permintaan pertolongan</label>
                        <input type="date" id="help-date" name="tanggal_pertolongan" value="{{ old('tanggal_pertolongan') }}">
                    </div>

                    <div class="form-group">
                        <label>Tentukan Rentang Waktu Permintaan Pertolongan</label>
                        <div class="time-range-group">
                           <input type="time" name="waktu_mulai" aria-label="Jam Mulai" value="{{ old('waktu_mulai') }}">
                           <span>-</span>
                           <input type="time" name="waktu_selesai" aria-label="Jam Selesai" value="{{ old('waktu_selesai') }}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="help-location">Tentukan Lokasi Permintaan Pertolongan</label>
                        <input type="text" id="help-location" name="lokasi" placeholder="Alamat lengkap" value="{{ old('lokasi') }}">
                    </div>
                </div>

                <div class="form-card">
                    <h2 class="form-card-title">Data Pengirim</h2>
                     <div class="form-group">
                         <label for="sender-name">Nama Lengkap (Sesuai KTP)</label>
                         {{-- Isi otomatis dengan nama user, tapi bisa diubah --}}
                         <input type="text" id="sender-name" name="nama_pemohon" placeholder="Nama Lengkap (Sesuai KTP)" value="{{ old('nama_pemohon', Auth::user()->name) }}">
                     </div>
                     <div class="form-group">
                         <label for="sender-contact">Nomor Ponsel atau Email</label>
                         <input type="text" id="sender-contact" name="kontak_pemohon" placeholder="Nomor Ponsel atau Email" value="{{ old('kontak_pemohon') }}">
                     </div>
                    <div class="form-group checkbox-group">
                        {{-- Ganti `id` dan tambahkan `name`--}}
                        <input type="checkbox" id="terms" name="terms">
                        <label for="terms">Dengan ini saya menyetujui syarat & ketentuan dan menyatakan identitas saya asli.</label>
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

            <script>
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