<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/profile', [RegisterController::class, 'profile']);

Route::middleware('auth')->group(function () {
    Route::get('/', [itemController::class, 'index']);
});

// // プロフィール画面に移行
// Route::get('/profile', function() {
//     return view('profile');
// })->middleware(['auth', 'verified']);