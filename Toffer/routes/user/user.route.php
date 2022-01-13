<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\V1\{
    UserController,
};


Route::get('/detail/{id}', [UserController::class, 'detail'])->name('detail');
