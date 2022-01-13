<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    use HasFactory;

    public $items = [];

    public function __construct(){
        $product = Product::first();
        if($product == null){
            Session::forget('cart');
        }

        if(Session::has('cart')){
            $cart = Session::get('cart');
            $this->items = $cart->items;
        }
    }

    public function add(Product $product){
        if(isset($this->items[$product->id])){
            $this->items[$product->id] = [
                'item' => $product,
                'qtd' => $this->items[$product->id]['qtd'] + 1,
            ];
        }else{
            $this->items[$product->id] = [
                'item' => $product,
                'qtd' => 1,
            ];
        }

    }

    public function getItems(){
        return  $this->items;
    }

    public function qtdCart(){
        return count($this->items);
    }

    public function remove(Product $product){
        if(isset($this->items[$product->id]) && $this->items[$product->id]['qtd'] > 1){
            $this->items[$product->id] = [
                'item' => $product,
                'qtd' => $this->items[$product->id]['qtd'] - 1,
            ];
        }else if (isset($this->items[$product->id])){
            unset($this->items[$product->id]);
        }
    }

    public function total(){
        $total = 0;
        foreach($this->items as $item){
           $subtotal = $item['item']->unit_price * $item['qtd'];
           $total += $subtotal;
        }
        return $total;
    }

    public function totalItem(){
        return count($this->items);
    }

    public function emptyCart(){
        if(Session::has('cart')){
            Session::forget('cart');
        }
    }

    public function removeOneproduct(Product $product){
        if(isset($this->items[$product->id]))
         unset($this->items[$product->id]);
    }
}
