<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\V1\{
    DashboardController,
};


Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('/dasboard/clients', [DashboardController::class, 'clients'])->name('dashboard.clients');