<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\V1\{
    ProductController,
};


Route::get("/product", [ProductController::class, 'index'])->name('product');
Route::get("/product/create", [ProductController::class, 'create'])->name('product.create');
Route::post("/product/store", [ProductController::class, 'store'])->name('product.store');
Route::get("/product/confirmeDelete/{id}", [ProductController::class, 'confirmeDeleteProduct'])->name('product.confirm');
Route::get("/product/delete/{id}", [ProductController::class, 'delete'])->name('product.delete');
Route::get("/product/edit/{id}", [ProductController::class, 'editar'])->name('product.editar');
Route::put("/product/update/{id}", [ProductController::class, 'update'])->name('product.update');