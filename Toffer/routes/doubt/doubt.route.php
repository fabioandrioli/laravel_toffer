<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\V1\{
    DoubtController,
};


Route::get("/doubt", [DoubtController::class, 'index'])->name('doubt');
Route::get("/doubt/delete/{id}", [DoubtController::class, 'delete'])->name('doubt.delete');
