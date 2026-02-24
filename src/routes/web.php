<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

//-------register------
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);

//--------profile-------
Route::get('/mypage/profile_setting', [RegisterController::class, 'setting_index'])->name('mypage.profile_setting');
Route::post('/mypage/profile_setting', [RegisterController::class, 'profile_setting']);

//---------login-------
Route::middleware('auth')->group(function () {
    //-------item------------
    Route::get('/', [itemController::class, 'index']);
});

// // プロフィール画面に移行
// Route::get('/profile', function() {
//     return view('profile');
// })->middleware(['auth', 'verified']);