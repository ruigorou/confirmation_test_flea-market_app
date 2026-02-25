<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;
use App\Http\Controllers\UserLoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

//----------未ログイン----------
Route::get('/', [itemController::class, 'top']);

//-------register------
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);

//--------profile-------
Route::get('/mypage/profile_setting', [RegisterController::class, 'setting_index'])->name('mypage.profile_setting');
Route::post('/mypage/profile_setting', [RegisterController::class, 'profile_setting']);

//---------login-------
Route::post('/login', [UserLoginController::class, 'login'])->name('login');
Route::middleware('auth')->group(function () {
    //-------item------------
    Route::get('/item', [itemController::class, 'index'])->name('item');
});

// // プロフィール画面に移行
// Route::get('/profile', function() {
//     return view('profile');
// })->middleware(['auth', 'verified']);