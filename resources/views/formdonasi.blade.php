<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Donasi - {{ $campaign->judul }}</title>
    
    {{-- Menggunakan helper asset() untuk membuat path yang benar --}}
    <link rel="stylesheet" href="{{ asset('css/globals.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formdonasi.css') }}">
</head>
<body>

    <header class="header">
        {{-- Kode header Anda --}}
    </header>

    <main class="form-main-content">
        {{-- 1. Pastikan form action menunjuk ke route 'donations.store' --}}
        <form action="{{ route('donations.store') }}" method="POST" class="form-container">
            @csrf
            {{-- 2. Pastikan ada input tersembunyi untuk campaign_id --}}
            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

            <div class="form-header">
                <h1>Kamu Akan Berdonasi untuk</h1>
            </div>

            {{-- KARTU SUMMARY CAMPAIGN DINAMIS --}}
            <div class="campaign-summary-card">
                <img src="{{ asset('storage/' . $campaign->gambar_url) }}" alt="{{ $campaign->judul }}" class="campaign-summary-img">
                <div class="campaign-summary-details">
                    <h2 class="campaign-summary-title">{{ $campaign->judul }}</h2>
                    <p class="campaign-summary-organizer">diinisiasi oleh <strong>{{ $campaign->user->name }}</strong></p>
                    @php
                        $persentase = $campaign->target_dana > 0 ? ($campaign->dana_terkumpul / $campaign->target_dana) * 100 : 0;
                    @endphp
                    <div class="progress-bar"><div class="progress" style="width: {{ min($persentase, 100) }}%;"></div></div>
                    <div class="fundraising-info">
                        <span>Terkumpul <strong>Rp{{ number_format($campaign->dana_terkumpul) }}</strong></span>
                        <span class="target">dari target Rp{{ number_format($campaign->target_dana) }}</span>
                    </div>
                </div>
            </div>

            {{-- Input tersembunyi untuk menyimpan nilai yang dipilih --}}
            <input type="hidden" name="jumlah" id="finalAmount" required>
            <input type="hidden" name="metode_pembayaran" id="paymentMethod" value="qris" required>

            <div class="form-section-card">
                <h3>Pilih Nominal Donasi</h3>
                <div class="nominal-grid">
                    <button type="button" class="nominal-button" data-value="10000">Rp 10,000</button>
                    <button type="button" class="nominal-button" data-value="25000">Rp 25,000</button>
                    <button type="button" class="nominal-button" data-value="50000">Rp 50,000</button>
                    <button type="button" class="nominal-button" data-value="100000">Rp 100,000</button>
                </div>
                <p class="custom-amount-label">atau nominal donasi lainnya (Minimal Rp 10.000)</p>
                <div class="custom-amount-input">
                    <span>Rp</span>
                    <input type="number" id="customAmount" placeholder="0" min="10000">
                </div>
            </div>

            <div class="form-section-card">
                <h3>Data Donatur</h3>
                <div class="form-group">
                    <label for="fullName">Nama Lengkap</label>
                    <input type="text" id="fullName" name="nama_donatur" placeholder="Nama Lengkap" value="{{ Auth::user()->name ?? '' }}" required>
                </div>
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="anonymous" name="is_anonymous">
                    <label for="anonymous">Sembunyikan nama saya (donasi sebagai anonim)</label>
                </div>
                <div class="form-group">
                    <label for="contact">Nomor Ponsel atau Email (Opsional)</label>
                    <input type="text" id="contact" name="kontak_donatur" placeholder="Nomor Ponsel atau Email">
                </div>
            </div>

            <div class="form-section-card">
                <div class="form-group">
                    <label for="supportMessage">Sertakan doa dan Dukungan (Opsional)</label>
                    <textarea id="supportMessage" name="pesan_dukungan" placeholder="Tulis doa dan dukungan..." maxlength="500"></textarea>
                </div>
            </div>
            
            <button type="submit" id="payButton" class="submit-donation-button">Lanjutkan Pembayaran</button>
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
                <button class="chat-button"><img src="./img/message.png" alt="chat icon"><span>1 Message Arrived</span></button>
            </div>
        </footer>

        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const nominalButtons = document.querySelectorAll('.nominal-button');
        const customAmountInput = document.getElementById('customAmount');
        const finalAmountInput = document.getElementById('finalAmount');

        function selectAmount(amount) {
            finalAmountInput.value = amount;
        }

        nominalButtons.forEach(button => {
            button.addEventListener('click', () => {
                nominalButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                const value = parseInt(button.dataset.value, 10);
                selectAmount(value);
                customAmountInput.value = '';
            });
        });

        customAmountInput.addEventListener('input', () => {
            nominalButtons.forEach(btn => btn.classList.remove('active'));
            const value = parseInt(customAmountInput.value, 10) || 0;
            selectAmount(value);
        });
    });
        </script>
</body>
</html>