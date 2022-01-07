<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

use  MercadoPago\SDK;
use MercadoPago;

class SiteController extends Controller
{
    public function index(){
        
        // SDK::setAccessToken(config('services.mercadopago.token'));

        // // Cria um objeto de preferência
        // $preference = new MercadoPago\Preference();



        // // Cria um item na preferência

        // $item = new MercadoPago\Item();
        // $item->title = 'Meu produto';
        // $item->quantity = 1;
        // $item->unit_price = 70.56;
        

        
        // $preference->back_urls = array(
        //     "success" => "https://www.seu-site/success",
        //     "failure" => "http://www.seu-site/failure",
        //     "pending" => "http://www.seu-site/pending"
        // );
        // $preference->auto_return = "approved";

        // $preference->items = array($item);
        // $preference->save();

        //return view('checkout.index',compact('preference'));
        // if( Auth::check()){
        //     $user = Auth::user();
        //     // dd( Auth::user()->address);
        //     // if($user->address == null){
        //     //     echo "sim";
        //     // }else{
        //     //     echo false;
        //     // }
        // }
        
       return view('site.home.index');
    }

    public function show(){

        $hasAddress = 0;
        if(Auth::check()){
            $user = Auth::user();
            if($user->address != null)
                $hasAddress = true;
        }

        $preference = $this->mercadoPago();
        return view('site.home.show',compact('preference','hasAddress'));
    }

    public function cart(){

     
        $preference = $this->mercadoPago();
        return view('site.home.cart',compact('preference'));
    }

    public function payment(){
       
    }

    private function mercadoPago(){
        SDK::setAccessToken(config('services.mercadopago.token'));

        // Cria um objeto de preferência
        $preference = new MercadoPago\Preference();



        // Cria um item na preferência

        $item = new MercadoPago\Item();
        $item->title = 'Meu produto';
        $item->quantity = 1;
        $item->unit_price = 70.56;
        

        
        $preference->back_urls = array(
            "success" => route("success"),
            // "failure" => "http://www.seu-site/failure",
            // "pending" => "http://www.seu-site/pending"
        );
        $preference->auto_return = "approved";

        $preference->items = array($item);
        $preference->save();
        return $preference;
    }

    public function success(Request $request){
        //"payment_id": "1245244885",
        $response = Http::get( 'https://api.mercadopago.com/v1/payments/1245244885'."?access_token=TEST-2888179626589580-121516-ba62988dfe4948306686c7796d7f1774-1040022616");

        return $response;
    }

    public function redirectUser(){
        if(Auth::user()->role == "cliente"){
            return redirect()->route("index");
        }else{
            return redirect()->route("clients");
        }
    }

    public function address(){
        return view("site.home.address");
    }

    public function saveAddressUser(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $data = $request->all();
            $data['state'] = "Paraná";
            $user->address()->create($data);
            return redirect()->route("cart");
        }
                
    }

}
