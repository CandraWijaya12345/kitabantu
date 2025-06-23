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

Route::get('/ganti_password', function () {
    return view('ganti_password');
});

Route::get('/search_campaign', function () {
    return view('search_campaign');
});

Route::get('/home', function () {
    return view('home');
});