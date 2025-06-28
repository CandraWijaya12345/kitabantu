<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/detail', function () {
    return view('detail');
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

Route::get('/formkitatolong', function () {
    return view('formkitatolong');
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

Route::get('/user', function () {
    return view('user');
});

Route::get('/user/ganti_password', function () {
    return view('ganti_password');
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

Route::get('/admin/dashboard', function () {
    return view('dashboard');
});

Route::get('/admin/campaign', function () {
    return view('admincampaign');
});

Route::get('/admin/donasi', function () {
    return view('admindonasi');
}); 

Route::get('/admin/user', function () {
    return view('adminuser');
});    

Route::get('/admin/verifcampaign', function () {
    return view('adminverifcampaign');
}); 

Route::get('/admin/statistik', function () {
    return view('adminstatistik');
});

Route::get('/admin/settings', function () {
    return view('adminsettings');
});

Route::get('/admin/kitatolong', function () {
    return view('adminkitatolong');
});

Route::get('/admin/adminverifkitatolong', function () {
    return view('adminverifkitatolong');
});