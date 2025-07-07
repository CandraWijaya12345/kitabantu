<?php
// File: routes/api.php
use App\Http\Controllers\MidtransCallbackController;
use Illuminate\Support\Facades\Route;

Route::post('/midtrans-callback', [MidtransCallbackController::class, 'handle']);

