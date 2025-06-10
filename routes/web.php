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