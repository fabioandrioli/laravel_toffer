<?php
    use Illuminate\Support\Facades\Route;
    
    use App\Http\Controllers\{
        ClientController,
    };

    Route::get('/dataClient', [ClientController::class, 'index'])->name('dataClient');
    Route::get('/editClient', [ClientController::class, 'editClient'])->name('editClient');
    Route::post('/updateClient', [ClientController::class, 'updateClient'])->name('update_client');

    Route::get('/editAddress', [ClientController::class, 'editAddress'])->name('editAddress');
    Route::post('/updateAddress', [ClientController::class, 'updateAddress'])->name('updateAddress');

    Route::get('/editPassword', [ClientController::class, 'editPassword'])->name('editPassword');
    Route::post('/updatePassword', [ClientController::class, 'updatePassword'])->name('updatePassword');