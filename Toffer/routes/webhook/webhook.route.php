<?php
    use Illuminate\Support\Facades\Route;
    
    use App\Http\Controllers\Web\V1\{
        WebhookController,
    };
    
   Route::post('/webhook',[WebhookController::class,"payment"]);
  
   