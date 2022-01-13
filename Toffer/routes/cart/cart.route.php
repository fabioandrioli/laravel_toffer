<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\V1\{
    CartController,
};

Route::get('/add-cart/{id}', [CartController::class,'add'])->name('cart.add');
Route::get('/remove-cart/{id}', [CartController::class,'remove'])->name('cart.remove');
Route::get('/remove-cart-product/{id}', [CartController::class,'removeOneproduct'])->name('cart.removeOneproduct');