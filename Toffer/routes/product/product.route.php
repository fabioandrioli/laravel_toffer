<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\V1\{
    ProductController,
};


Route::get("/product", [ProductController::class, 'index'])->name('product');
Route::get("/product/create", [ProductController::class, 'create'])->name('product.create');
Route::post("/product/store", [ProductController::class, 'store'])->name('product.store');
Route::post("/product/search", [ProductController::class, 'search'])->name('product.search');
Route::get("/product/confirmeDelete/{id}", [ProductController::class, 'confirmeDeleteProduct'])->name('product.confirm');
Route::get("/product/delete/{id}", [ProductController::class, 'delete'])->name('product.delete');
Route::get("/product/edit/{id}", [ProductController::class, 'editar'])->name('product.editar');
Route::put("/product/update/{id}", [ProductController::class, 'update'])->name('product.update');

Route::get("/product/showSpecification/{id}", [ProductController::class, 'showSpecification'])->name('product.showSpecification');
Route::get("/product/newSpecification/{id}", [ProductController::class, 'newSpecification'])->name('product.newSpecification');
Route::post("/product/storeSpecification", [ProductController::class, 'storeSpecification'])->name('product.storeSpecification');
Route::get("/product/editSpecification/{id}", [ProductController::class, 'editSpecification'])->name('product.editSpecification');
Route::get("/product/deleteSpecification/{id}", [ProductController::class, 'deleteSpecification'])->name('product.deleteSpecification');
Route::put("/product/updateSpecification/{id}", [ProductController::class, 'updateSpecification'])->name('product.updateSpecification');