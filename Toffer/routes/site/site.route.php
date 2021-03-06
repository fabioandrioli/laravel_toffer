<?php
    use Illuminate\Support\Facades\Route;
    
    use App\Http\Controllers\Web\V1\{
        SiteController,

    };
    
    Route::get('/', [SiteController::class,'index'])->name('site.index');
    Route::get('/site/form', [SiteController::class, 'form'])->name('site.form');
    Route::post('/site/register', [SiteController::class, 'create'])->name('site.register');
    Route::get('/show/{id}', [SiteController::class,'show'])->name('site.show');
    Route::get('/cart', [SiteController::class,'cart'])->name('site.cart');
    Route::post('/search', [SiteController::class,'search'])->name('site.search');
    Route::get('/contact', [SiteController::class, 'contact'])->name('contact');