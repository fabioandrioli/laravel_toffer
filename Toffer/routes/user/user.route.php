<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\V1\{
    UserController,
};


Route::get('/detail/{id}', [UserController::class, 'detail'])->name('detail');
Route::get('/user', [UserController::class, 'index'])->name('dashboard.user');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/search', [UserController::class, 'search'])->name('user.search');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/ban/{id}', [UserController::class, 'ban'])->name('user.ban');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

