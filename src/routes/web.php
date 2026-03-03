<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\LikeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

//----------未ログイン----------
Route::get('/', [ItemController::class, 'top']);
Route::get('item/{item_id}', [ItemController::class, 'detail'])->name('item.detail');

//-------register------
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);

//--------profile-------
Route::get('/mypage/profile_setting', [RegisterController::class, 'setting_index'])->name('mypage.profile_setting');
Route::post('/mypage/profile_setting', [RegisterController::class, 'profile_setting']);

//---------login-------
Route::post('/login', [UserLoginController::class, 'login'])->name('login');

//-----------------ログイン後-------------------
Route::middleware('auth')->group(function () {
    //-------item------------
    Route::get('/item', [itemController::class, 'index'])->name('item');

    //----------listing---------
    Route::get('/sell', [SellController::class, 'listing'])->name('sell');
    Route::post('/sell', [SellController::class, 'product_listing'])->name('selll.listing');

    Route::post('item/{item_id}', [LikeController::class, 'toggle'])
    ->middleware('auth')
    ->name('products.like');
});

// // プロフィール画面に移行
// Route::get('/profile', function() {
//     return view('profile');
// })->middleware(['auth', 'verified']);