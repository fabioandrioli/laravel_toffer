<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    SiteController,
    DashboardController,
};

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

Route::get('/', [SiteController::class,'index'])->name('index');
Route::get('/show', [SiteController::class,'show'])->name('show');
Route::get('/cart', [SiteController::class,'cart'])->name('cart');

Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');
