<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - Admin KitaBantu</title>
    <link rel="stylesheet" href="/css/adminsettings.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="logo">KitaBantu</a>
            </div>
            <nav class="sidebar-nav">
                <a href="#" class="nav-item">
                    <img src="./img/icon-dashboard.png" alt="" class="nav-icon">
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-item">
                    <img src="./img/icon-campaign.png" alt="" class="nav-icon">
                    <span>Campaign</span>
                </a>
                <a href="#" class="nav-item">
                    <img src="./img/icon-donasi.png" alt="" class="nav-icon">
                    <span>Donasi</span>
                </a>
                <a href="#" class="nav-item">
                    <img src="./img/icon-user.png" alt="" class="nav-icon">
                    <span>User</span>
                </a>
                <a href="#" class="nav-item">
                    <img src="./img/icon-verifikasi.png" alt="" class="nav-icon">
                    <span>Verifikasi Campaign</span>
                </a>
                <a href="#" class="nav-item">
                    <img src="./img/icon-statistik.png" alt="" class="nav-icon">
                    <span>Statistik</span>
                </a>
                <a href="#" class="nav-item">
                    <img src="./img/icon-pengaturan.png" alt="" class="nav-icon">
                    <span>Pengaturan</span>
                </a>
                <a href="#" class="nav-item active"> <img src="./img/icon-kitatolong.png" alt="" class="nav-icon">
                    <span>KitaTolong</span>
                </a>
                <a href="#" class="nav-item">
                    <img src="./img/icon-verifikasi-kitatolong.png" alt="" class="nav-icon">
                    <span>Verifikasi KitaTolong</span>
                </a>
            </nav>
            <div class="sidebar-footer">
                <a href="#" class="nav-item logout">
                    <img src="./img/icon-logout.png" alt="" class="nav-icon">
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div class="search-bar">
                    <img src="./img/search-icon-gray.png" alt="Search">
                    <input type="text" placeholder="Cari...">
                </div>
                <div class="admin-profile">
                    <div class="profile-info">
                        <p class="profile-name">Admin</p>
                        <p class="profile-role">Super Admin</p>
                    </div>
                    <img src="./img/admin-avatar.png" alt="Admin Avatar" class="profile-avatar">
                </div>
            </header>

            <section class="settings-container">
                <div class="widget">
                    <h3>Informasi Akun</h3>
                    <form class="settings-form">
                        <div class="form-group">
                            <label for="admin-name">Nama Lengkap</label>
                            <input type="text" id="admin-name" value="Admin KitaBantu">
                        </div>
                        <div class="form-group">
                            <label for="admin-email">Email</label>
                            <input type="email" id="admin-email" value="admin@kitabantu.com">
                        </div>
                        <div class="form-group">
                            <label for="admin-phone">Nomor Handphone</label>
                            <input type="tel" id="admin-phone" value="081234567890">
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">Simpan Informasi</button>
                        </div>
                    </form>
                </div>

                <div class="widget">
                    <h3>Ganti Password</h3>
                    <form class="settings-form">
                        <div class="form-group">
                            <label for="old-password">Password Lama</label>
                            <input type="password" id="old-password" placeholder="Masukkan password lama">
                        </div>
                        <div class="form-group">
                            <label for="new-password">Password Baru</label>
                            <input type="password" id="new-password" placeholder="Masukkan password baru">
                        </div>
                         <div class="form-group">
                            <label for="confirm-password">Konfirmasi Password Baru</label>
                            <input type="password" id="confirm-password" placeholder="Ulangi password baru">
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">Ubah Password</button>
                        </div>
                    </form>
                </div>
            </section>

        </main>
    </div>
</body>
</html>