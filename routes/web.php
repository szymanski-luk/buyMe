<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/categories', [CategoryController::class, 'categoriesList'])->name('categories_list');

Route::get('/auctions/new', [AdvertController::class, 'newAdvert'])->name('new_auction');

Route::post('/auctions/save', [AdvertController::class, 'saveAdvert'])->name('save_auction');

Route::get('/auctions/my', [AdvertController::class, 'myAdverts'])->name('my_adverts');
