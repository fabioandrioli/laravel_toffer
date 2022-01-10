<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CartController extends Controller
{


   
    public function add($id){
        $product = Product::find($id);

        $cart = new Cart();
        $cart->add($product);
       
        Session::put('cart',$cart);
        Session::save();

       return redirect()->route('site.cart');
      
    }

    public function remove($id){
        $product = Product::find($id);
        $cart = new Cart();
        $cart->remove($product);
        Session::put('cart',$cart);
        Session::save();
        return redirect()->route('site.cart');
    }

    public function removeOneproduct($id){
        $product = Product::find($id);
        $cart = new Cart();
        $cart->removeOneproduct($product);
        Session::put('cart',$cart);
        Session::save();
        return redirect()->route('site.cart');
    }
}
