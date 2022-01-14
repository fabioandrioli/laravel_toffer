<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\V1\{
    OrderController,
};

Route::get("/order", [ OrderController::class, 'index'])->name('order');
Route::get("/delivery", [ OrderController::class, 'delivery'])->name('delivery');
Route::get("/dispatched", [ OrderController::class, 'dispatched'])->name('dispatched');
Route::get("/exchange", [ OrderController::class, 'exchange'])->name('exchange');
Route::get("/giveup", [ OrderController::class, 'giveup'])->name('giveup');

Route::get("/order/exchange/{id}", [ OrderController::class, 'waiting'])->name('order.exchange');
Route::get("/delivery/exchange/{id}", [ OrderController::class, 'delivery_exchange'])->name('delivery.exchange');
Route::get("/dispatched/exchange/{id}", [ OrderController::class, 'dispatched_exchange'])->name('dispatched.exchange');
Route::get("/exchange/exchange/{id}", [ OrderController::class, 'exchange_exchange'])->name('exchange.exchange');
Route::get("/giveup/exchange/{id}", [ OrderController::class, 'giveup_exchange'])->name('giveup.exchange');
