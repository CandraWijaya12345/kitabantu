<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CampaignController; // Diambil dari versi remote/merge
use App\Http\Controllers\DonationController; // Diambil dari versi remote/merge
use App\Http\Controllers\HelpRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminCampaignController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminKitaTolongController;
use App\Http\Controllers\AdminSettingsController;

Route::get('/', [CampaignController::class, 'home'])->name('home');

Route::get('/home', [CampaignController::class, 'home'])->name('homepage.alias'); // Memberi nama alias jika diperlukan

// Rute Autentikasi
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Rute Publik (tidak memerlukan login)
Route::get('/detail', function () {
    return view('detail');
});

// Pastikan route ini ada
Route::get('/donate', [CampaignController::class, 'index'])->name('donate.index');


// Menampilkan halaman detail satu campaign. Namanya disesuaikan dengan error.
Route::get('/donatemenu/{campaign:slug}', [CampaignController::class, 'show'])->name('donate.menu');

Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/onprocess', function () {
    return view('onprocess');
});

Route::get('/accepted', function () {
    return view('status_accepted');
});

Route::get('/rejected', function () {
    return view('status_rejected');
});

Route::get('/list_kitatolong', function () {
    return view('list_kitatolong');
});

Route::get('/search_campaign', [App\Http\Controllers\CampaignController::class, 'search'])->name('campaigns.search');


// Rute yang memerlukan autentikasi pengguna
Route::middleware(['auth'])->group(function () {
    // Menampilkan form untuk melakukan donasi ke campaign spesifik
    Route::get('/user', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/user', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/user/ganti_password', [ProfileController::class, 'showChangePasswordForm'])->name('password.edit');
    Route::post('/user/ganti_password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::get('/formdonasi/{campaign:slug}', [DonationController::class, 'create'])->name('donate.form');
    Route::get('/formdonasi', [DonationController::class, 'create'])->name('donations.create');
    Route::post('/formdonasi', [DonationController::class, 'store'])->name('donations.store');
    Route::get('/donation/thank-you', [DonationController::class, 'thankYou'])->name('donations.thankyou');
    Route::get('/formkitatolong', function () { return view('formkitatolong'); });
    Route::get('/galang-dana/create', [CampaignController::class, 'create'])->name('campaigns.create');
    Route::post('/galang-dana', [CampaignController::class, 'store'])->name('campaigns.store');
    Route::get('/formkitatolong', [HelpRequestController::class, 'create'])->name('kitatolong.create');
    Route::post('/formkitatolong', [HelpRequestController::class, 'store'])->name('kitatolong.store');
    Route::get('/list_kitatolong', [HelpRequestController::class, 'index'])->name('kitatolong.index');
    Route::get('/user/campaigns', [ProfileController::class, 'myCampaigns'])->name('profile.campaigns');
});


// Rute Admin dikelompokkan dalam prefix 'admin' dan middleware 'auth', 'admin'
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    Route::get('/campaign', [AdminCampaignController::class, 'index'])->name('campaigns.index');
    Route::post('/campaign/{campaign}/approve', [AdminCampaignController::class, 'approve'])->name('campaigns.approve');
    Route::post('/campaign/{campaign}/reject', [AdminCampaignController::class, 'reject'])->name('campaigns.reject');
    Route::delete('/campaign/{campaign}', [AdminCampaignController::class, 'destroy'])->name('campaigns.destroy');
    Route::get('/user', [AdminUserController::class, 'index'])->name('users.index');
    Route::post('/user/{user}/update-role', [AdminUserController::class, 'updateRole'])->name('users.updateRole');
    Route::get('/kitatolong', [AdminKitaTolongController::class, 'index'])->name('kitatolong.index');
    Route::post('/kitatolong/{helpRequest}/approve', [AdminKitaTolongController::class, 'approve'])->name('kitatolong.approve');
    Route::post('/kitatolong/{helpRequest}/reject', [AdminKitaTolongController::class, 'reject'])->name('kitatolong.reject');
    Route::post('/kitatolong/{helpRequest}/assign', [AdminKitaTolongController::class, 'assignVolunteer'])->name('kitatolong.assign');
    Route::get('/settings', [AdminSettingsController::class, 'show'])->name('settings.show');
    Route::post('/settings/profile', [AdminSettingsController::class, 'updateProfile'])->name('settings.updateProfile');
    Route::post('/settings/password', [AdminSettingsController::class, 'updatePassword'])->name('settings.updatePassword');
    
    Route::get('/donasi', function () {
        return view('admindonasi'); // Mengacu ke admindonasi.blade.php
    });

    Route::get('/verifcampaign', function () {
        return view('adminverifcampaign'); // Mengacu ke adminverifcampaign.blade.php
    });

    Route::get('/statistik', function () {
        return view('adminstatistik'); // Mengacu ke adminstatistik.blade.php
    });

    // Rute Penarikan Dana (dipindahkan ke dalam grup admin)
    Route::get('/tarikdana', function () {
        return view('adminpenarikandana'); // Mengacu ke adminpenarikandana.blade.php
    });

});