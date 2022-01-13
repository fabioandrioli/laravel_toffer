<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    SiteController,
    DashboardController,
    UserController,
    ClientController,
    ProductController,
    CartController,
    CategoryController,
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

Route::get('/', [SiteController::class,'index'])->name('site.index');
Route::get('/show/{id}', [SiteController::class,'show'])->name('site.show');
Route::get('/cart', [SiteController::class,'cart'])->name('site.cart');
Route::get('/add-cart/{id}', [CartController::class,'add'])->name('cart.add');
Route::get('/remove-cart/{id}', [CartController::class,'remove'])->name('cart.remove');
Route::get('/remove-cart-product/{id}', [CartController::class,'removeOneproduct'])->name('cart.removeOneproduct');

//Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'],function(){
    Route::group(['middleware' => 'auth'],function(){
        
    Route::post('/duvidas', [SiteController::class,'duvidas'])->name('site.duvidas');

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
    Route::get("/product/create", [ProductController::class, 'create'])->name('product.create');
    Route::post("/product/store", [ProductController::class, 'store'])->name('product.store');
    Route::get("/product/confirmeDelete/{id}", [ProductController::class, 'confirmeDeleteProduct'])->name('product.confirm');
    Route::get("/product/delete/{id}", [ProductController::class, 'delete'])->name('product.delete');
    Route::get("/product/edit/{id}", [ProductController::class, 'editar'])->name('product.editar');
    Route::put("/product/update/{id}", [ProductController::class, 'update'])->name('product.update');

    Route::get("/category", [CategoryController::class, 'index'])->name('category');
    Route::get("/category/create", [CategoryController::class, 'create'])->name('category.create');
    Route::post("/category/store", [CategoryController::class, 'store'])->name('category.store');
    Route::get("/category/delete/{id}", [CategoryController::class, 'delete'])->name('category.delete');
    Route::get("/category/edit/{id}", [CategoryController::class, 'editar'])->name('category.editar');
    Route::put("/category/update/{id}", [CategoryController::class, 'update'])->name('category.update');
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