<?php

use App\Http\Controllers\AdminController;
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



Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

// MAIN PAGE
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// CATEGORIES
Route::get('/categories', [CategoryController::class, 'categoriesList'])->name('categories_list');
Route::get('/categories/{id}', [CategoryController::class, 'details'])->name('categories_details');
Route::post('/categories/new', [CategoryController::class, 'saveCategory'])->name('new_category');
Route::post('/categories/edit', [CategoryController::class, 'editCategory'])->name('edit_category');

// AUCTIONS
Route::get('/auctions/new', [AdvertController::class, 'newAdvert'])->name('new_auction');
Route::post('/auctions/save', [AdvertController::class, 'saveAdvert'])->name('save_auction');
Route::get('/auctions/my', [AdvertController::class, 'myAdverts'])->name('my_adverts');
Route::get('/auctions/{id}', [AdvertController::class, 'details'])->name('advert_details');
Route::get('/auctions/', [AdvertController::class, 'search'])->name('searching');
Route::post('/auctions/edit', [AdvertController::class, 'edit'])->name('edit_auction');
Route::post('/auctions/delete', [AdvertController::class, 'delete'])->name('delete_auction');

// ADMIN PANEL
Route::get('/panel/usersList', [AdminController::class, 'usersList'])->name('users_list');
Route::post('/panel/usersList/give', [AdminController::class, 'giveAdminRights'])->name('give_admin_rights');
Route::post('/panel/usersList/revoke', [AdminController::class, 'revokeAdminRights'])->name('revoke_admin_rights');
