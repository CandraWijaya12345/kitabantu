<?php
// File: routes/web.php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HelpRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminCampaignController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminKitaTolongController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminDonationController;
use App\Http\Controllers\WithdrawalController;

// == RUTE PUBLIK ==
Route::get('/', [CampaignController::class, 'home'])->name('home');
Route::get('/donate', [CampaignController::class, 'index'])->name('donate.index');
Route::get('/donatemenu/{campaign:slug}', [CampaignController::class, 'show'])->name('donate.menu');
Route::get('/search_campaign', [CampaignController::class, 'search'])->name('campaigns.search');

// == RUTE AUTENTIKASI ==
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// == RUTE YANG MEMERLUKAN LOGIN PENGGUNA ==
Route::middleware(['auth'])->group(function () {
    // Profil Pengguna
    Route::get('/user', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/user', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/user/ganti_password', [ProfileController::class, 'showChangePasswordForm'])->name('password.edit');
    Route::post('/user/ganti_password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::get('/list_campaign', [ProfileController::class, 'myCampaigns'])->name('profile.campaigns');
    
    // Galang Dana
    Route::get('/galang-dana/create', [CampaignController::class, 'create'])->name('campaigns.create');
    Route::post('/galang-dana', [CampaignController::class, 'store'])->name('campaigns.store');
    Route::get('/campaign/{id}/tarik-dana', [CampaignController::class, 'showTarikDanaForm'])->name('tarik.dana.form');
    Route::post('/campaign/{id}/tarik-dana', [WithdrawalController::class, 'store'])->name('withdrawals.store');

    // KitaTolong
    Route::get('/formkitatolong', [HelpRequestController::class, 'create'])->name('kitatolong.create');
    Route::post('/formkitatolong', [HelpRequestController::class, 'store'])->name('kitatolong.store');
    Route::get('/list-kitatolong', [HelpRequestController::class, 'index'])->name('kitatolong.index');
});

// == RUTE DONASI (Bisa diakses tanpa login) ==
Route::get('/formdonasi', [DonationController::class, 'create'])->name('donations.create');
Route::post('/formdonasi', [DonationController::class, 'store'])->name('donations.store');

// == RUTE ADMIN ==
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/campaign', [AdminCampaignController::class, 'index'])->name('campaigns.index');
    Route::post('/campaign/{campaign}/approve', [AdminCampaignController::class, 'approve'])->name('campaigns.approve');
    Route::post('/campaign/{campaign}/reject', [AdminCampaignController::class, 'reject'])->name('campaigns.reject');
    Route::delete('/campaign/{campaign}', [AdminCampaignController::class, 'destroy'])->name('campaigns.destroy');
    Route::get('/campaign/{campaign}/edit', [AdminCampaignController::class, 'edit'])->name('campaigns.edit');
    Route::patch('/campaign/{campaign}', [AdminCampaignController::class, 'update'])->name('campaigns.update');
    Route::get('/user', [AdminUserController::class, 'index'])->name('users.index');
    Route::post('/user/{user}/update-role', [AdminUserController::class, 'updateRole'])->name('users.updateRole');
    Route::get('/kitatolong', [AdminKitaTolongController::class, 'index'])->name('kitatolong.index');
    Route::post('/kitatolong/{helpRequest}/approve', [AdminKitaTolongController::class, 'approve'])->name('kitatolong.approve');
    Route::post('/kitatolong/{helpRequest}/reject', [AdminKitaTolongController::class, 'reject'])->name('kitatolong.reject');
    Route::post('/kitatolong/{helpRequest}/assign', [AdminKitaTolongController::class, 'assignVolunteer'])->name('kitatolong.assign');
    Route::get('/settings', [AdminSettingsController::class, 'show'])->name('settings.show');
    Route::post('/settings/profile', [AdminSettingsController::class, 'updateProfile'])->name('settings.updateProfile');
    Route::post('/settings/password', [AdminSettingsController::class, 'updatePassword'])->name('settings.updatePassword');
    Route::get('/donasi', [AdminDonationController::class, 'index'])->name('admin.donasi.index');
    Route::patch('/withdrawals/{id}/approve', [AdminWithdrawalController::class, 'approve'])->name('admin.withdrawals.approve');
    Route::patch('/withdrawals/{id}/reject', [AdminWithdrawalController::class, 'reject'])->name('admin.withdrawals.reject');

});
