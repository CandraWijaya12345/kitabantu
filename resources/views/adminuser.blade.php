<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User - KitaBantu</title>
    <link rel="stylesheet" href="{{ secure_asset('css/adminuser.css') }}">
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
                <a href="/admin/user" class="nav-item active">
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
                <a href="/admin/settings" class="nav-item">
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
                    <input type="text" placeholder="Cari nama atau email user...">
                </div>
                <div class="admin-profile">
                    <div class="profile-info">
                        <p class="profile-name">Admin</p>
                        <p class="profile-role">Super Admin</p>
                    </div>
                    <img src="/img/adminicon.png" alt="Admin Avatar" class="profile-avatar">
                </div>
            </header>

            <section class="user-summary">
                <div class="summary-card">
                    <div class="card-icon green"><img src="/img/usericon.png" alt=""></div>
                    <div class="card-info">
                        <p class="card-title">User Sedang Online</p>
                        {{-- Tampilkan data jumlah user online --}}
                        <p class="card-value">{{ number_format($onlineUsersCount) }}</p>
                    </div>
                </div>
            </section>

            <section class="widget list-widget">
                <div class="widget-header"><h3>Data Pengguna Terdaftar</h3></div>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Terakhir Aktif</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->last_seen_at ? $user->last_seen_at->diffForHumans() : 'Belum Pernah' }}</td>
                                <td>
                                    {{-- Tampilkan status Online/Offline berdasarkan method isOnline() --}}
                                    @if($user->isOnline())
                                        <span class="status-tag online">Online</span>
                                    @else
                                        <span class="status-tag offline">Offline</span>
                                    @endif
                                </td>
                            <td>
                                <span class="role-tag role-{{ strtolower($user->role) }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    {{-- Mencegah admin mengubah role-nya sendiri --}}
                                    @if($user->id !== Auth::id())
                                        
                                        {{-- Jika user adalah 'user', tampilkan tombol untuk menjadikannya 'volunteer' --}}
                                        @if($user->role === 'user')
                                            <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="role" value="volunteer">
                                                <button type="submit" class="btn-action make-volunteer">Jadikan Volunteer</button>
                                            </form>

                                        {{-- Jika user adalah 'volunteer', tampilkan tombol untuk menjadikannya 'user' biasa --}}
                                        @elseif($user->role === 'volunteer')
                                            <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="role" value="user">
                                                <button type="submit" class="btn-action make-user">Jadikan User</button>
                                            </form>
                                        @endif

                                    @else
                                        <span class="text-muted">(Akun Anda)</span>
                                    @endif
                                </div>
                            </td>
                            </tr>
                            @empty
                            <tr><td colspan="5">Tidak ada data pengguna ditemukan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- Tampilkan link paginasi --}}
                <div class="pagination">
                    {{ $users->appends(request()->query())->links() }}
                </div>
            </section>

        </main>
    </div>
</body>
</html>