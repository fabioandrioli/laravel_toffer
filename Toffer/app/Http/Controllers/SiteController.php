<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('site.home.index');
    }
}
