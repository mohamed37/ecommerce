<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!

|http://localhost/ecommerce/admin/login

*/

define('PAGINATION_COUNT', 10);


Route::group([
              'namespace'=> 'Admin', 
	            'middleware' => [ 'auth:admin' ]
            ], function(){
    Route::get('/' ,'DashboardController@index')->name('dashboard');

           
    
    
   
    ######################### End Languages Route ########################


      ################### Start MainCategories Route###################

      Route::group(['prefix'=>'maincategories'],function () {
        Route::get('/','MainCategoriesController@index')->name('admin.maincategories');
        Route::get('/create','MainCategoriesController@create')->name('admin.maincategories.create');
        Route::post('/store','MainCategoriesController@store')->name('admin.maincategories.store');
        Route::get('/show/{id}','MainCategoriesController@show')->name('admin.maincategories.show');
        Route::get('/edit/{id}','MainCategoriesController@edit')->name('admin.maincategories.edit');
        Route::post('/update/{id}','MainCategoriesController@update')->name('admin.maincategories.update');
        Route::get('/delete/{id}','MainCategoriesController@destroy')->name('admin.maincategories.delete');
        Route::get('/changeStatus/{id}','MainCategoriesController@changeStatus')->name('admin.maincategories.status');

    });

    ######################### End MainCategories Route ########################

    ################### Start SubCategories Route###################

    Route::group(['prefix'=>'subcategories'],function () {
      Route::get('/','SubCategoriesController@index')->name('admin.sub_categories');
      Route::get('/create','SubCategoriesController@create')->name('admin.sub_categories.create');
      Route::post('/store','SubCategoriesController@store')->name('admin.sub_categories.store');
      Route::get('/edit/{id}','SubCategoriesController@edit')->name('admin.sub_categories.edit');
      Route::post('/update/{id}','SubCategoriesController@update')->name('admin.sub_categories.update');
      Route::get('/delete/{id}','SubCategoriesController@destroy')->name('admin.sub_categories.delete');
      Route::get('/changeStatus/{id}','SubCategoriesController@changeStatus')->name('admin.sub_categories.status');


    });

    ######################### End SubCategories Route ########################
    ################### Start Vendors Route###################

       Route::group(['prefix'=>'vendors'],function () {
        Route::get('/','VendorsController@index')->name('admin.vendors');
        Route::get('/create','VendorsController@create')->name('admin.vendors.create');
        Route::post('/store','VendorsController@store')->name('admin.vendors.store');
        Route::get('/edit/{id}','VendorsController@edit')->name('admin.vendors.edit');
        Route::post('/update/{id}','VendorsController@update')->name('admin.vendors.update');
        Route::get('/delete/{id}','VendorsController@destroy')->name('admin.vendors.delete');
        Route::get('/changeStatus/{id}','VendorsController@changeStatus')->name('admin.vendors.status');
        Route::get('/getsubajax/{category_id}','VendorsController@getSubCat')->name('getsubcat');
        Route::get('/search','VendorsController@search')->name('search');
        Route::get('/fillter','VendorsController@fillter')->name('admin.vendors.fillter');

      });

    ######################### End Vendors Route ########################

    
      
    
    
     ################### Start Offers Route###################

     Route::group(['prefix'=>'offers'],function () {
        Route::get('/','OffersController@index')->name('admin.offers');
        Route::get('/create','OffersController@create')->name('admin.offers.create');
        Route::post('/store','OffersController@store')->name('admin.offers.store');
        Route::get('/delete/{id}','OffersController@destroy')->name('admin.offers.delete');
        Route::get('/changeStatus/{id}','OffersController@changeStatus')->name('admin.offers.status');


    });

    ######################### End Offers Route ########################

     ################### Start branches Route###################

     Route::group(['prefix'=>'branches'],function () {
        Route::get('/','BranchesController@index')->name('admin.branches');
        Route::get('/create','BranchesController@create')->name('admin.branches.create');
        Route::post('/store','BranchesController@store')->name('admin.branches.store');
        Route::get('/delete/{id}','BranchesController@destroy')->name('admin.branches.delete');
        Route::get('/changeStatus/{id}','BranchesController@changeStatus')->name('admin.branches.status');


    });

    ######################### End branches Route ########################


     ################### Start products Route###################

     Route::group(['prefix'=>'products'],function () {
        Route::get('/','ProductsController@index')->name('admin.products');
        Route::get('/create','ProductsController@create')->name('admin.products.create');
        Route::post('/store','ProductsController@store')->name('admin.products.store');
        Route::get('/edit/{id}','ProductsController@edit')->name('admin.products.edit');
        Route::post('/update/{id}','ProductsController@update')->name('admin.products.update');
        Route::get('/delete/{id}','ProductsController@destroy')->name('admin.products.delete');
        Route::get('/changeStatus/{id}','ProductsController@changeStatus')->name('admin.products.status');


    });

    ######################### End products Route ########################


     ################### Start customers Route###################

     Route::group(['prefix'=>'customers'],function () {
      Route::get('/','CustomerController@index')->name('admin.customers');
      Route::get('/create','CustomerController@create')->name('admin.customers.create');
      Route::post('/store','CustomerController@store')->name('admin.customers.store');
      Route::get('/edit/{id}','CustomerController@edit')->name('admin.customers.edit');
      Route::post('/update/{id}','CustomerController@update')->name('admin.customers.update');
      Route::get('/delete/{id}','CustomerController@destroy')->name('admin.customers.delete');
      Route::get('/changeStatus/{id}','CustomerController@changeStatus')->name('admin.customers.status');


     });
  ######################### End customers Route ########################

 ################### Start delivery Route###################

      Route::group(['prefix'=>'delivery'],function () {
        Route::get('/','DeliveryController@index')->name('admin.delivery');
        Route::get('/create','DeliveryController@create')->name('admin.delivery.create');
        Route::post('/store','DeliveryController@store')->name('admin.delivery.store');
        Route::get('/edit/{id}','DeliveryController@edit')->name('admin.delivery.edit');
        Route::post('/update/{id}','DeliveryController@update')->name('admin.delivery.update');
        Route::get('/delete/{id}','DeliveryController@destroy')->name('admin.delivery.delete');

      });

######################### End Delivery Route ########################

    ################### Start orders Route###################

    Route::group(['prefix'=>'orders'],function () {
      Route::get('/','OrdersController@index')->name('admin.orders');
      Route::get('/create','OrdersController@create')->name('admin.orders.create');
     // Route::post('/store','OrdersController@store')->name('admin.orders.store');
      Route::get('/edit/{id}','OrdersController@edit')->name('admin.orders.edit');
      Route::get('/show/{id}','OrdersController@show')->name('admin.orders.show');
      Route::get('/delete/{id}','OrdersController@destroy')->name('admin.orders.delete');
      Route::get('/changeStatus/{id}','OrdersController@changeStatus')->name('admin.orders.status');


  });
  ######################### End orders Route ########################

   ################### Start choose delivery Route###################

   Route::group(['prefix'=>'choose_delivery'],function () {
    Route::get('/','ChooseDelivery@index')->name('admin.choose-delivery');
    Route::get('/update/{id}','ChooseDelivery@update')->name('admin.status');
    Route::post('/store/{delivery}','ChooseDelivery@store')->name('admin.deliveryOrder');
    Route::get('/getcustomer/{customer_id}','ChooseDelivery@getCustomer')->name('getcustomer');
    

});

################### End choose delivery Route###################  

  Route::group(['namespace'=> 'OrderCreate', ],function () {
    Route::get('/order/create/{customer}','OrderController@create')->name('admin.order.create');
    Route::post('/order/store/{customer}','OrderController@store')->name('admin.order.store');
  });
  Route::get('/sginout',"LoginController@sginout")->name('admin.sginout');
});


Route::get('home', 'HomeController@index')->name('front');
Route::group(['namespace'=> 'Admin'], function(){

    Route::get('/login',"LoginController@getLogin")->name('get.admin.login');
    Route::post('/login',"LoginController@Login")->name('admin.login');

   

});