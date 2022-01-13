<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    DashboardController,
};


Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('/clients', [DashboardController::class, 'clients'])->name('clients');