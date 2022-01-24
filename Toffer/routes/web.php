<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require "site/site.route.php";
require "cart/cart.route.php";
require "webhook/webhook.route.php";
require "email/email.router.php";

//Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'],function(){
Route::group(['middleware' => 'verified'],function(){
  
        require "site/site.auth.route.php";
        require "user/user.route.php";
        require "product/product.route.php";
        require "category/category.route.php";
        require "client/client.route.php";
        require "dashboard/dashboard.route.php";
        require "doubt/doubt.route.php";
        require "order/order.route.php";
});

Route::get('/welcome',function(){
    return view('auth.registerTowTest');
});


Auth::routes(['register' => false]);
// Authentication Routes...

  Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
  ])->name('site.login');
