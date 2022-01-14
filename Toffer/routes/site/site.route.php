<?php
    use Illuminate\Support\Facades\Route;
    
    use App\Http\Controllers\Web\V1\{
        SiteController,

    };
    
    Route::get('/', [SiteController::class,'index'])->name('site.index');
    Route::get('/show/{id}', [SiteController::class,'show'])->name('site.show');
    Route::get('/cart', [SiteController::class,'cart'])->name('site.cart');
   