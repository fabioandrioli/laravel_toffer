<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\V1\{
    EmailController,
};


Route::post("/email/contact", [EmailController::class, 'contact'])->name('email.contact');
Route::get("/doubt/delete/{id}", [DoubtController::class, 'delete'])->name('doubt.delete');
