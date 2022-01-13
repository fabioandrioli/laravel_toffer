<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\V1\{
    CategoryController,
};



Route::get("/category", [CategoryController::class, 'index'])->name('category');
Route::get("/category/create", [CategoryController::class, 'create'])->name('category.create');
Route::post("/category/store", [CategoryController::class, 'store'])->name('category.store');
Route::get("/category/delete/{id}", [CategoryController::class, 'delete'])->name('category.delete');
Route::get("/category/edit/{id}", [CategoryController::class, 'editar'])->name('category.editar');
Route::put("/category/update/{id}", [CategoryController::class, 'update'])->name('category.update');