<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Notifications\NotificationPayment;

class WebhookController extends Controller
{
    public function payment(Request $request){
            $user = User::where("email","fabio.drioli@gmail.com");
            $user->notify(new NotificationPayment());
            $payment_id = $request->get("payment_id");
            $response = Http::get( "https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=TEST-2888179626589580-121516-ba62988dfe4948306686c7796d7f1774-1040022616");
            $response = json_decode($response);
            $status = $response->status;
            if($status == "approved"){
                
            }

            return $response;
    }
}
