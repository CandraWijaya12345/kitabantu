<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController; 
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;

Route::get('/', function () {
    return view('home');
});
Route::get('/', [CampaignController::class, 'home'])->name('home');

Route::get('/home', [CampaignController::class, 'home'])->name('home');

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

Route::get('/detail', function () {
    return view('detail');
});

Route::middleware(['auth'])->group(function () {
    // Menampilkan form untuk melakukan donasi ke campaign spesifik
    Route::get('/formdonasi/{campaign:slug}', [DonationController::class, 'create'])->name('donate.form');
    
    // Memproses data dari form donasi yang di-submit
    Route::post('/formdonasi', [DonationController::class, 'store'])->name('donate.store');

    // Route untuk halaman profil dan lainnya yang butuh login
    Route::get('/user', function () { return view('user'); });
    Route::get('/user/ganti_password', function () { return view('ganti_password'); });
    Route::get('/formkitatolong', function () { return view('formkitatolong'); });
});

Route::get('/donate', function () {
    return view('donate');
});

Route::get('/donatemenu', function () {
    return view('donatemenu');
});

Route::get('/formdonasi', function () {
    return view('formdonasi');
});

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

Route::get('/search_campaign', function () {
    return view('search_campaign');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/tarikdana', function () {
    return view('tarikdana');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/campaign', function () {
        return view('admincampaign');
    });

    Route::get('/donasi', function () {
        return view('admindonasi');
    }); 

    Route::get('/user', function () {
        return view('adminuser');
    });    

    Route::get('/verifcampaign', function () {
        return view('adminverifcampaign');
    }); 

    Route::get('/statistik', function () {
        return view('adminstatistik');
    });

    Route::get('/settings', function () {
        return view('adminsettings');
    });

    Route::get('/kitatolong', function () {
        return view('adminkitatolong');
    });

});