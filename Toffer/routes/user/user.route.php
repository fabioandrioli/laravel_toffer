<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    UserController,
};


Route::get('/detail/{id}', [UserController::class, 'detail'])->name('detail');
