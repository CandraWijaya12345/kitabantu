<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesaikan Pembayaran Donasi - KitaBantu</title>
    
    <!-- 1. Muat skrip Snap.js dari Midtrans Sandbox -->
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>
            
    <style>
        body { 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0;
            background-color: #f7faff; 
            color: #304e7a; 
        }
        .container { 
            text-align: center; 
            background: white; 
            padding: 40px 50px; 
            border-radius: 15px; 
            box-shadow: 0 8px 25px rgba(0,0,0,0.1); 
        }
        h1 { 
            font-size: 2rem; 
            margin-bottom: 1rem; 
        }
        p { 
            font-size: 1.1rem; 
            line-height: 1.6; 
        }
        #pay-button { 
            background-color: #5893ea; 
            color: white; 
            border: none; 
            padding: 15px 30px; 
            font-size: 16px; 
            border-radius: 8px; 
            cursor: pointer; 
            margin-top: 20px; 
            font-weight: 600;
            transition: background-color 0.2s;
        }
        #pay-button:hover {
            background-color: #4a83d3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Satu Langkah Lagi...</h1>
        <p>Anda akan berdonasi sebesar <strong>Rp{{ number_format($donation->jumlah) }}</strong> untuk campaign:</p>
        <p><strong>"{{ $donation->campaign->judul }}"</strong></p>
        <br>
        <button id="pay-button">Lanjutkan ke Pembayaran</button>
    </div>

    <script type="text/javascript">
      // 2. Ambil tombol pembayaran
      var payButton = document.getElementById('pay-button');
      
      // 3. Tambahkan event listener untuk klik
      payButton.addEventListener('click', function () {
        // 4. Panggil snap.pay() dengan Snap Token yang dikirim dari controller
        snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            /* Pengguna akan diarahkan setelah pembayaran berhasil. */
            alert("Pembayaran berhasil!"); 
            console.log(result);
            // Arahkan ke halaman utama atau halaman "terima kasih" Anda
            window.location.href = '/'; 
          },
          onPending: function(result){
            /* Pembayaran tertunda, biasanya untuk metode seperti bank transfer */
            alert("Pembayaran Anda tertunda. Selesaikan pembayaran sebelum kedaluwarsa."); 
            console.log(result);
            window.location.href = '/';
          },
          onError: function(result){
            /* Terjadi kesalahan saat pembayaran */
            alert("Pembayaran gagal!"); 
            console.log(result);
            window.location.href = '/';
          },
          onClose: function(){
            /* Pengguna menutup pop-up pembayaran tanpa menyelesaikan transaksi */
            alert('Anda menutup jendela pembayaran sebelum selesai.');
          }
        });
      });
    </script>
</body>
</html>
