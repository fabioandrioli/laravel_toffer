<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Doubt;
use Illuminate\Support\Facades\Date;

use Illuminate\Support\Facades\Session;

use  MercadoPago\SDK;
use MercadoPago;

class SiteController extends Controller
{
    public function index(){
        
      $products = Product::orderBy('id', 'DESC')->get();
        
       return view('site.home.index',compact('products'));
    }

    public function show($id){

        $product = Product::find($id);
        
        $hasAddress = 0;
        if(Auth::check()){
            $user = Auth::user();
            if($user->address != null)
                $hasAddress = true;
        }

        $preference = $this->mercadoPago($product);
        return view('site.home.show',compact('preference','hasAddress','product'));
    }

    public function cart(){

        $cart = new Cart();

        $products = $cart->getItems();
        $preference = $this->mercadoPago($products);
        return view('site.home.cart',compact('preference','cart','products'));
    }

    public function payment(){
       
    }

    private function mercadoPago($product){
    
        SDK::setAccessToken(config('services.mercadopago.token'));

        // Cria um objeto de preferência
        $preference = new MercadoPago\Preference();


        if(!empty($product)){
            // Cria um item na preferência
            if(!is_array($product)){
                $item = new MercadoPago\Item();
                $item->title = $product->title;
                $item->quantity = 1;
                $item->currency_id = 'BRL';
                $item->unit_price = $product->unit_price;
                $preference->items = array($item);
            }else{
                foreach($product as $prod){
                    $item = new MercadoPago\Item();
                    $item->title = $prod['item']->title;
                    $item->quantity = $prod['qtd'];
                    $item->currency_id = 'BRL';
                    $item->unit_price = $prod['item']->unit_price;

                    $products[] = $item;
                }

    

                $preference->items = $products;
            }

            
            $preference->back_urls = array(
                "success" => route("success"),
                // "failure" => "http://www.seu-site/failure",
                // "pending" => "http://www.seu-site/pending"
            );
            $preference->auto_return = "approved";

            // $payer = new MercadoPago\Payer();
            // // $payer->id      =  Auth::user()->id;
            // $payer->name    = Auth::user()->name;
            // $payer->email   = Auth::user()->email;
            // $payer->surname = Auth::user()->name;
            // $address['address'] = Auth::user()->address;
            // $payer->date_created = date("Y-m-d");

            // $payer->address =  $address['address'];

        

            // $preference->payer = $payer;
            $preference->save();
            return $preference;
        }

        return redirect()->route("site.index");
    }

    public function success(Request $request){
        //"payment_id": "1245244885",
        $response = Http::get( 'https://api.mercadopago.com/v1/payments/1245244885'."?access_token=TEST-2888179626589580-121516-ba62988dfe4948306686c7796d7f1774-1040022616");

        return $response;
    }

    public function redirectUser(){
        if(Auth::user()->role == "cliente"){
            return redirect()->route("site.index");
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
            return redirect()->route("site.cart");
        }
                
    }

    public function duvidas(Request $request){
       // Doubt::create($request->all());
        session(['message' => 'Sua duvida foi respondida']);
        return redirect()->back();
    }

}
