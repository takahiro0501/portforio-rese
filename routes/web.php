<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//店舗ルート
Route::get('/', [ShopController::class, 'index']);
Route::resource('shop', ShopController::class);
//予約データ取得
Route::post('shop/getData', [ShopController::class, 'getData']);
//予約データ登録
Route::post('shop/registerData', [ShopController::class, 'registerData']);
//お気に入り登録/解除
Route::post('getFavorite', [ShopController::class, 'getFavorite']);
Route::post('favorite', [ShopController::class, 'registerFavorite']);
Route::post('shop/favorite', [ShopController::class, 'registerFavorite']);
//
Route::get('myPage', [MyPageController::class, 'index'])->name('myPage');


//認証系ルート
Route::post('shop/register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('/shop/login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('shop/logout', [AuthController::class, 'logout']);


