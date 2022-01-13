<?php
    use Illuminate\Support\Facades\Route;
    
    use App\Http\Controllers\{
        SiteController,
    };
    
    Route::get('/', [SiteController::class,'index'])->name('site.index');
    Route::get('/show/{id}', [SiteController::class,'show'])->name('site.show');
    Route::get('/cart', [SiteController::class,'cart'])->name('site.cart');
    Route::get('/add-cart/{id}', [CartController::class,'add'])->name('cart.add');
    Route::get('/remove-cart/{id}', [CartController::class,'remove'])->name('cart.remove');
    Route::get('/remove-cart-product/{id}', [CartController::class,'removeOneproduct'])->name('cart.removeOneproduct');