<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\FrontController;
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
    Route::group(['namespace' => 'customer', 'middleware' => 'auth:customer'], function() {
        
        Route::get('logout', 'FrontController@customerLogout')->name('customer.logout');
        Route::get('shop',[FrontController::class,'shop'])->name('shop');
        Route::get('category/{id}', [FrontController::class,'category'])->name('category');
        Route::get('product/{id}', [FrontController::class,'showProduct'])->name('product');
        Route::get('products/{id}', [FrontController::class,'Products'])->name('products');

        Route::group(['namespace'=> 'OrderCart', ],function () {
            Route::get('/order/create/{customer}','OrderController@create')->name('order.cart');
            Route::get('/order/cart/{customer}','OrderController@viewCart')->name('cart');
            Route::post('/order/{customer}','OrderController@addCart')->name('order.addcart');
            Route::post('/order/store/{customer}','OrderController@store')->name('order.cart.store');
            Route::get('/order/wiating',
                function(){
                    return view('front.orders.waiting');
                })->name('waiting');
            Route::delete('/order/{id}', 'OrderController@destroy')->name('delete.order');    

          });
       
    });

    Route::group(['namespace'=> 'customer'], function(){
    
        Route::get('login', 'FrontController@getlogin')->name('customer.login');
        
        Route::post('register', 'FrontController@customerRegister')->name('customer.register');
        Route::post('/signin',"FrontController@customerLogin")->name('signin');
 
        
        Route::get('register', function(){
            return view('front.auth.register');
         })->name('cfregister');
       

        Route::get('home', function () {
            return view('front.home');
        })->name('main');     
    });
?>