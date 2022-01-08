<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    SiteController,
    DashboardController,
    UserController,
    ClientController,
    ProductController,
};

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

Route::get('/', [SiteController::class,'index'])->name('index');
Route::get('/show', [SiteController::class,'show'])->name('show');
Route::get('/cart', [SiteController::class,'cart'])->name('cart');

//Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'],function(){
Route::group(['middleware' => 'auth'],function(){
    Route::get('/success', [SiteController::class,'success'])->name('success');
    Route::get('/redirect_user', [SiteController::class, 'redirectUser']);
    Route::get('/address', [SiteController::class, 'address'])->name('address');
    Route::post('/saveAddressUser', [SiteController::class, 'saveAddressUser'])->name('saveAddressUser');

    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/clients', [DashboardController::class, 'clients'])->name('clients');

    Route::get('/dataClient', [ClientController::class, 'index'])->name('dataClient');
    Route::get('/editClient', [ClientController::class, 'editClient'])->name('editClient');
    Route::post('/updateClient', [ClientController::class, 'updateClient'])->name('update_client');

    Route::get('/editAddress', [ClientController::class, 'editAddress'])->name('editAddress');
    Route::post('/updateAddress', [ClientController::class, 'updateAddress'])->name('updateAddress');

    Route::get('/editPassword', [ClientController::class, 'editPassword'])->name('editPassword');
    Route::post('/updatePassword', [ClientController::class, 'updatePassword'])->name('updatePassword');

    Route::get('/detail/{id}', [UserController::class, 'detail'])->name('detail');

    Route::get("/product", [ProductController::class, 'index'])->name('product');
    Route::get("/product-create", [ProductController::class, 'create'])->name('product.create');
    Route::post("/product-store", [ProductController::class, 'store'])->name('product.store');
    Route::get("/confirmeDeleteProduct/{id}", [ProductController::class, 'confirmeDeleteProduct'])->name('product.confirm');
    Route::get("/deleteProduct/{id}", [ProductController::class, 'delete'])->name('product.delete');
});

Route::get('/welcome',function(){
    return view('auth.registerTowTest');
});

Auth::routes();
// Authentication Routes...
// Route::get('login', [
//     'as' => 'login',
//     'uses' => 'Auth\LoginController@showLoginForm'
//   ])->name('site.login');
//   Route::post('login', [
//     'as' => '',
//     'uses' => 'Auth\LoginController@login'
//   ])->name('site.login');
//   Route::get('logout', [
//     'as' => 'logout',
//     'uses' => 'Auth\LoginController@logout'
//   ]);