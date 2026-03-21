<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProductPurchaseController;
use App\Http\Controllers\CommentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

//----------未ログイン----------
Route::get('/', [ItemController::class, 'top'])->name('top');
Route::get('item/{item_id}', [ItemController::class, 'detail'])->name('item.detail');
Route::post('/search', [ItemController::class, 'search'])->name('search');

//-------register------
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);

//---------login-------
Route::post('/login', [UserLoginController::class, 'login'])->name('login');

//-----------------ログイン後-------------------
Route::middleware('auth')->group(function () {
    route::post('/', [ItemController::class, 'mylist'])->name('mylist');

    //-------item------------
    Route::get('/recommend', [ItemController::class, 'recommend'])->name('recommend');
    
    Route::get('/item', [ItemController::class, 'item_search'])->name('item.search');

    //--------- profile -------
    Route::get('/mypage/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/mypage/profile', [ProfileController::class, 'profile_create'])->name('profile.create');

    //----------listing---------
    Route::get('/sell', [SellController::class, 'listing'])->name('sell');
    Route::post('/sell/product/listing', [SellController::class, 'product_listing'])->name('sell.listing');

    //---------mypage-----------
    Route::get('/mypage', [MypageController::class, 'listed_item'])->name('mypage');
    Route::post('/mypage', [MypageController::class, 'search'])->name('mypage.search');

    //---------- Product Purchase --------
    Route::get('/purchase/{product_id}', [ProductPurchaseController::class, 'purchase'])->name('product.purchase');
    Route::post('/purchase/{product_id}', [ProductPurchaseController::class, 'purchase_procedure'])->name('purchase.procedure');

    //---------- `delivery address ----------
    Route::get('purchase/address/{item_id}', [ProductPurchaseController::class, 'delivery_address'])->name('purchase.address');
    Route::post('purchase/address/{item_id}', [ProductPurchaseController::class, 'address_update'])->name('address.update');

    //--------like -----------
    Route::post('/like/{product}/toggle', [LikeController::class, 'toggle']);

    //--------comments---------
    Route::post('/comment', [CommentController::class, 'comment_create']);
});

// // プロフィール画面に移行
// Route::get('/profile', function() {
//     return view('profile');
// })->middleware(['auth', 'verified']);