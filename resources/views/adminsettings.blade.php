<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - Admin KitaBantu</title>
    <link rel="stylesheet" href="{{ asset('css/adminsettings.css') }}">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="logo">KitaBantu</a>
            </div>
            <nav class="sidebar-nav">
                <a href="/admin/dashboard" class="nav-item ">
                    <img src="/img/dashboardadmin.png" alt="Dashboard Icon" class="nav-icon">
                    <span>Dashboard</span>
                </a>
                <a href="/admin/campaign" class="nav-item">
                    <img src="/img/ads.png" alt="Campaign" class="nav-icon"> 
                    <span>Campaign</span>
                </a>
                <a href="/admin/donasi" class="nav-item">
                    <img src="/img/donationicon.png" alt="Donasi Icon" class="nav-icon">
                    <span>Donasi</span>
                </a>
                <a href="/admin/user" class="nav-item">
                    <img src="/img/usericon.png" alt="User Icon" class="nav-icon">
                    <span>User</span>
                </a>
                <a href="/admin/tarikdana" class="nav-item">
                    <img src="/img/penarikandanaicon.png" alt="Penarikan Dana Icon" class="nav-icon">
                    <span>Penarikan Dana</span>
                </a>
                <a href="/admin/statistik" class="nav-item">
                    <img src="/img/statistikicon.png" alt="Statistik Icon" class="nav-icon">
                    <span>Statistik</span>
                </a>
                <a href="/admin/settings" class="nav-item active">
                    <img src="/img/settingicon.png" alt="Setting Icon" class="nav-icon">
                    <span>Pengaturan</span>
                </a>
                <a href="/admin/kitatolong" class="nav-item">
                    <img src="/img/kitatolongicon.png" alt="Kita Tolong Icon" class="nav-icon">
                    <span>KitaTolong</span>
                </a>
            </nav>
            <div class="sidebar-footer">
                <a href="#" class="nav-item logout">
                    <img src="/img/logout.png" alt="Logout Icon" class="nav-icon">
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div class="search-bar">
                    <img src="/img/search.png" alt="Search">
                    <input type="text" placeholder="Cari...">
                </div>
                <div class="admin-profile">
                    <div class="profile-info">
                        <p class="profile-name">Admin</p>
                        <p class="profile-role">Super Admin</p>
                    </div>
                    <img src="/img/adminicon.png" alt="Admin Avatar" class="profile-avatar">
                </div>
            </header>

            <section class="settings-container">
                {{-- WIDGET INFORMASI AKUN --}}
                <div class="widget">
                    <h3>Informasi Akun</h3>
                    @if(session('success_profile'))<div class="alert-success">{{ session('success_profile') }}</div>@endif
                    
                    <form action="{{ route('admin.settings.updateProfile') }}" method="POST" class="settings-form">
                        @csrf
                        <div class="form-group">
                            <label for="admin-name">Nama Lengkap</label>
                            <input type="text" id="admin-name" name="name" value="{{ old('name', $user->name) }}">
                            @error('name')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="admin-email">Email</label>
                            <input type="email" id="admin-email" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="admin-phone">Nomor Handphone</label>
                            <input type="tel" id="admin-phone" name="nomor_hp" value="{{ old('nomor_hp', $user->detail->nomor_hp ?? '') }}">
                            @error('nomor_hp')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">Simpan Informasi</button>
                        </div>
                    </form>
                </div>

                {{-- WIDGET GANTI PASSWORD --}}
                <div class="widget">
                    <h3>Ganti Password</h3>
                    @if(session('success_password'))<div class="alert-success">{{ session('success_password') }}</div>@endif
                    
                    <form action="{{ route('admin.settings.updatePassword') }}" method="POST" class="settings-form">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Password Lama</label>
                            <input type="password" id="current_password" name="current_password" placeholder="Masukkan password lama" required>
                            @error('current_password')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" id="new_password" name="new_password" placeholder="Masukkan password baru" required>
                            @error('new_password')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="Ulangi password baru" required>
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