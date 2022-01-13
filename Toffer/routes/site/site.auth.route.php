<?php
    use Illuminate\Support\Facades\Route;
    
    use App\Http\Controllers\{
        SiteController,
    };
    

    Route::post('/duvidas', [SiteController::class,'duvidas'])->name('site.duvidas');
    Route::get('/success', [SiteController::class,'success'])->name('success');
    Route::get('/redirect_user', [SiteController::class, 'redirectUser']);
    Route::get('/address', [SiteController::class, 'address'])->name('address');
    Route::post('/saveAddressUser', [SiteController::class, 'saveAddressUser'])->name('saveAddressUser');