<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MypageController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

//----------未ログイン----------
Route::get('/', [ItemController::class, 'top']);
Route::get('item/{item_id}', [ItemController::class, 'detail'])->name('item.detail');

//-------register------
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);

//---------login-------
Route::post('/login', [UserLoginController::class, 'login'])->name('login');

//-----------------ログイン後-------------------
Route::middleware('auth')->group(function () {
    //--------- profile -------
    Route::get('/mypage/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/mypage/profile', [ProfileController::class, 'profile_create'])->name('profile.create');

    //-------item------------
    Route::get('/item', [ItemController::class, 'index'])->name('item');

    //----------listing---------
    Route::get('/sell', [SellController::class, 'listing'])->name('sell');
    Route::post('/sell/product/listing', [SellController::class, 'product_listing'])->name('sell.listing');

    //---------mypage-----------
    Route::get('/mypage', [MypageController::class, 'listed_item'])->name('mypage');

    Route::post('item/{item_id}', [LikeController::class, 'toggle'])
    ->middleware('auth')
    ->name('products.like');
});

// // プロフィール画面に移行
// Route::get('/profile', function() {
//     return view('profile');
// })->middleware(['auth', 'verified']);