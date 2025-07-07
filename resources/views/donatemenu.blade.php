<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Judul dinamis --}}
    <title>Donasi - {{ $campaign->judul }} - KitaBantu</title>
    <link rel="stylesheet" href="/css/globals.css">
    <link rel="stylesheet" href="/css/donatemenu.css">
</head>
<body>

    <header class="header">
        {{-- Header Anda tetap sama --}}
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
                    <img src="/img/search.png" alt="Search Icon" class="search-icon">
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
                                onclick="event.preventDefault(); this.closest('form').submit();">
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
        <section class="donate-section">
            <div class="donate-container">
                <div class="donate-left-column">
                    {{-- Judul Campaign --}}
                    <h1 class="donate-title">{{ $campaign->judul }}</h1>
                    <div class="donate-image-wrapper">
                        {{-- Gambar Campaign --}}
                        <img src="{{ asset('storage/' . $campaign->gambar_url) }}" alt="{{ $campaign->judul }}">
                    </div>
                    <div class="donate-buttons">
                        {{-- Tombol Donasi (arahkah ke halaman pembayaran nanti) --}}
                        <a href="{{ route('donations.create', ['campaign_id' => $campaign->id]) }}" class="donate-button primary">Donasi Sekarang</a>
                        <a href="#" class="donate-button secondary">Bagikan ke yang lain</a>
                    </div>
                </div>

                <div class="donate-right-column">
                    <div class="fundraising-details">
                        <div class="fundraising-amount">
                            {{-- Dana Terkumpul --}}
                            <span class="raised">Rp{{ number_format($campaign->dana_terkumpul, 0, ',', '.') }}</span>
                            {{-- Target Dana --}}
                            <span class="target">dari target Rp{{ number_format($campaign->target_dana, 0, ',', '.') }}</span>
                        </div>
                        
                        {{-- Kalkulasi Progress Bar --}}
                        @php
                            $persentase = $campaign->target_dana > 0 ? ($campaign->dana_terkumpul / $campaign->target_dana) * 100 : 0;
                        @endphp
                        <div class="progress-bar">
                            <div class="progress" style="width: {{ min($persentase, 100) }}%;"></div>
                        </div>

                        {{-- Deskripsi Singkat --}}
                        <p class="fundraising-summary">{{ $campaign->deskripsi_singkat }}</p>
                        
                        <div class="donor-info">
                            <img src="/img/eye.png" alt="Dilihat">

                            {{-- Menampilkan Jumlah View dari kolom 'view_count' --}}
                            <span class="donor-count">{{ number_format($campaign->view_count) }} Dilihat</span>

                            {{-- Bagian lokasi/kategori sudah dihapus sesuai permintaan --}}
                        </div>
                    </div>

                    <div class="fundraiser-profile">
                        {{-- Foto profil bisa ditambahkan nanti jika ada di model User --}}
                        <img src="/img/person.png" alt="Avatar {{ $campaign->user->name }}" class="fundraiser-avatar">
                        <div class="fundraiser-info">
                            {{-- Nama Penggalang Dana --}}
                            <h3 class="fundraiser-name">{{ $campaign->user->name }}</h3>
                            <p class="fundraiser-role">Penggalang Dana</p>
                        </div>
                    </div>

                    <div class="campaign-story">
                        {{-- Deskripsi Lengkap (Cerita Campaign) --}}
                        {{-- nl2br mengubah baris baru (\n) menjadi tag <br> agar format paragraf terjaga --}}
                        <p>{!! nl2br(e($campaign->deskripsi_lengkap)) !!}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="donor-support-section">
            <div class="donor-support-container">
                <h2>Dukungan Donatur</h2>

                {{-- Loop untuk menampilkan setiap donasi --}}
                @forelse ($donations as $donation)
                    <div class="donor-comment">
                        <img src="/img/person.png" alt="Avatar Donatur" class="commenter-avatar">
                        <div class="comment-content">
                            {{-- Nama bisa dari user yang login atau nama yang diinput saat donasi --}}
                            <h4 class="commenter-name">
                                {{ $donation->nama_donatur ?? ($donation->user->name ?? 'Donatur') }}
                            </h4>

                            {{-- Format tanggal donasi --}}
                            <p class="comment-date">{{ $donation->created_at->format('d-m-Y • H:i') }}</p>
                            {{-- Pesan dukungan dari donatur --}}
                            <p class="comment-amount"><strong>Memberikan </strong> Rp{{ number_format($donation->jumlah, 0, ',', '.') }},</p>
                            <p class="comment-text">{{ $donation->pesan_dukungan }}</p>
                        </div>
                    </div>
                @empty
                    {{-- Pesan ini akan tampil jika tidak ada donasi sama sekali --}}
                    <div class="donor-comment">
                        <p>Belum ada dukungan donatur untuk campaign ini. Jadilah yang pertama!</p>
                    </div>
                @endforelse

            </div>
        </section>
    </main>
    
    <button class="floating-chat-button">
        <img src="/img/message.png" alt="chat icon">
        <span>1 Message Arrived</span>
    </button>

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