<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galang Dana - KitaBantu</title>
    <link rel="stylesheet" href="/css/galangdana.css">
</head>
<body>
    <div class="page-wrapper">
        <header class="header">
        <nav class="nav">
            <div class="nav-section nav-left">
                <a href="/formdonasi" class="nav-link">Galang Dana</a>
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


    <main class="form-main">
        <div class="form-header">
            <h1>Galang Dana Sekarang!</h1>
            <p>Galang dana lebih mudah, mulai dari sini, jadilah alasan mereka tersenyum hari ini!</p>
        </div>

    <form class="fundraising-form" action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-grid">
        <div class="form-section category-section">
            <h3>Pilih Kategori Penggalangan Dana</h3>
            <div class="category-buttons">
                <input type="radio" id="cat-pendidikan" name="kategori" value="Pendidikan" {{ old('kategori') == 'Pendidikan' ? 'checked' : '' }}> <label for="cat-pendidikan" class="category-button-label">Pendidikan</label>
                <input type="radio" id="cat-infrastruktur" name="kategori" value="Infrastruktur Umum" {{ old('kategori') == 'Infrastruktur Umum' ? 'checked' : '' }}> <label for="cat-infrastruktur" class="category-button-label">Infrastruktur Umum</label>
                <input type="radio" id="cat-bencana" name="kategori" value="Bencana Alam" {{ old('kategori') == 'Bencana Alam' ? 'checked' : '' }}> <label for="cat-bencana" class="category-button-label">Bencana Alam</label>
                <input type="radio" id="cat-lingkungan" name="kategori" value="Lingkungan" {{ old('kategori') == 'Lingkungan' ? 'checked' : '' }}> <label for="cat-lingkungan" class="category-button-label">Lingkungan</label>
                <input type="radio" id="cat-difabel" name="kategori" value="Difabel" {{ old('kategori') == 'Difabel' ? 'checked' : '' }}> <label for="cat-difabel" class="category-button-label">Difabel</label>
                <input type="radio" id="cat-hewan" name="kategori" value="Menolong Hewan" {{ old('kategori') == 'Menolong Hewan' ? 'checked' : '' }}> <label for="cat-hewan" class="category-button-label">Menolong Hewan</label>
                <input type="radio" id="cat-umum" name="kategori" value="Umum" {{ old('kategori', 'Umum') == 'Umum' ? 'checked' : '' }}> <label for="cat-umum" class="category-button-label">Umum</label>
            </div>
        </div>
        <div class="form-section upload-section">
            <label for="gambar" class="upload-area">
                <img src="{{ asset('img/icon-camera.png') }}" alt="Upload Icon">
                <p>Upload Gambar (Maks 2MB)</p>
            </label>
            <input type="file" id="gambar" name="gambar" hidden>
        </div>
    </div>

{{-- Ganti blok Deskripsi Penggalangan Dana Anda dengan ini --}}
    <div class="form-section">
        <h3>Deskripsi Penggalangan Dana</h3>
        <div class="form-group">
            <label for="judul">Judul Campaign</label>
            <input type="text" id="judul" name="judul" placeholder="Tulis judul dari Penggalangan Dana Anda" required value="{{ old('judul') }}">
            @error('judul')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        {{-- KITA TAMBAHKAN INPUT UNTUK DESKRIPSI SINGKAT --}}
        <div class="form-group">
            <label for="deskripsi_singkat">Deskripsi Singkat (Maks 150 karakter)</label>
                <textarea name="deskripsi_singkat" id="deskripsi_singkat" rows="3" placeholder="Tulis ringkasan singkat yang menarik untuk campaign Anda." required>{{ old('deskripsi_singkat') }}</textarea>
                @error('deskripsi_singkat')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi_lengkap">Deskripsi Lengkap</label>
                <textarea name="deskripsi_lengkap" id="deskripsi_lengkap" rows="7" placeholder="Jelaskan secara rinci tujuan, latar belakang, dan rencana penggunaan dana." required>{{ old('deskripsi_lengkap') }}</textarea>
                @error('deskripsi_lengkap')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
    </div>

    {{-- Ganti blok Keterangan Penggalangan Dana Anda dengan ini --}}
    <div class="form-section">
        <h3>Keterangan Penggalangan Dana</h3>
        <div class="form-group">
            <label>Tentukan tanggal berakhirnya Penggalangan Dana</label>
            <input type="date" name="batas_waktu" required value="{{ old('batas_waktu') }}">
            @error('batas_waktu')<span class="error-text">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Tentukan target donasi yang ingin dicapai (Minimal Rp 1.000.000)</label>
            <div class="currency-input">
                <span>Rp</span>
                <input type="number" name="target_dana" placeholder="1000000" required value="{{ old('target_dana') }}">
            </div>
            @error('target_dana')<span class="error-text">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="form-section agreement-section">
    <div class="checkbox-group">
        <input type="checkbox" id="terms1" name="terms1" required>
        <label for="terms1">Pemilik rekening bertanggung jawab atas penggunaan dana yang diterima dari galang dana ini.</label>
    </div>
     <div class="checkbox-group">
        <input type="checkbox" id="terms2" name="terms2" required>
        <label for="terms2">Sebagai penerima dana bertanggung jawab atas mengirimkan Laporan pencairan dan pelaporan penggunaan dana.</label>
    </div>
</div>

<div class="modal-overlay" id="successOverlay"></div>
    <div class="success-modal" id="successModal">
        <img src="{{ asset('img/icon-success-check.png') }}" alt="Success">
        <h2>Pengajuan Galang Dana Berhasil!</h2>
        <p>Tim kami akan segera meninjau pengajuan Anda. Mohon tunggu konfirmasi selanjutnya.</p>
        <a href="{{ route('home') }}" class="btn-back-home">Kembali ke Beranda</a>
    </div>

</body>
</html>

<button type="submit" class="submit-button">Mulai Penggalangan Dana</button>

    </form>
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
            </div>
        </footer>
    </div>

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

        document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.getElementById('gambar');
            const uploadLabel = document.querySelector('.upload-area');

            imageInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        // Hapus konten lama
                        uploadLabel.innerHTML = '';

                        // Buat elemen img baru
                        const imgPreview = document.createElement('img');
                        imgPreview.src = e.target.result;
                        imgPreview.alt = 'Preview Gambar';

                        // Tambahkan class CSS di sini
                        imgPreview.classList.add('preview-image');

                        uploadLabel.appendChild(imgPreview);
                    };

                    reader.readAsDataURL(file);
                }
            });
        });

    </script>
</body>
</html>