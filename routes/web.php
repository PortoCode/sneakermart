<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', ['as'=>'home.show', 'uses'=>'App\Http\Controllers\HomeController@show']);

// Address
Route::group(['prefix' => 'address'], function () {
    Route::get('/find-by-zipcode/{zipcode}', ['as'=>'address.findByZipcode', 'uses'=>'App\Http\Controllers\AddressController@findByZipcode']);
});

// Store
Route::group(['prefix' => 'stores'], function () {
    Route::get('/page/{store_id}', ['as'=>'stores.showPage', 'uses'=>'App\Http\Controllers\StoreController@showPage']);
});

// Product
Route::group(['prefix' => 'products'], function () {
    Route::get('/page/{product_id}', ['as'=>'products.showPage', 'uses'=>'App\Http\Controllers\ProductController@showPage']);
});

// Home
Route::group(['prefix' => 'home'], function () {
    Route::get('', ['as'=>'home.show', 'uses'=>'App\Http\Controllers\HomeController@show']);
});

// Cart
Route::group(['prefix' => 'carts'], function () {
    Route::get('/{cart_id}', ['as'=>'carts.show', 'uses'=>'App\Http\Controllers\CartController@show']);
});

// Rating
Route::group(['prefix' => 'ratings'], function () {
    Route::get('/{rating_id}', ['as'=>'ratings.show', 'uses'=>'App\Http\Controllers\RatingController@show']);
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    // User profile data. Used as home while we don't have a home. Same ending as route users.show
    Route::get('/your-profile',                                 ['as'=>'user.index',   'uses'=>'App\Http\Controllers\HomeController@index']);

    // Users admin routes
    Route::group(['prefix' => 'users', 'middleware' => 'role:admin'], function () {
        Route::get('/',                                         ['as'=>'users.index',   'uses'=>'App\Http\Controllers\UserController@index']);
        Route::get('/create',                                   ['as'=>'users.create',  'uses'=>'App\Http\Controllers\UserController@create']);
        Route::post('/',                                        ['as'=>'users.store',   'uses'=>'App\Http\Controllers\UserController@store']);
        Route::delete('/{user_id}',                             ['as'=>'users.destroy', 'uses'=>'App\Http\Controllers\UserController@destroy']);
        Route::get('/{user_id}/edit',                           ['as'=>'users.edit',    'uses'=>'App\Http\Controllers\UserController@edit']);
    });
    // Users open role routes
    Route::group(['prefix' => 'users'], function () {
        Route::get('/{user_id}',                                ['as'=>'users.show',    'uses'=>'App\Http\Controllers\UserController@show']);
        Route::match(['put', 'patch'], '/{user_id}',            ['as'=>'users.update',  'uses'=>'App\Http\Controllers\UserController@update']);
    });

    // Stores
    Route::group(['prefix' => 'stores', 'middleware' => 'role:admin'], function () {
        Route::get('/',                                         ['as'=>'stores.index',   'uses'=>'App\Http\Controllers\StoreController@index']);
        Route::get('/create',                                   ['as'=>'stores.create',  'uses'=>'App\Http\Controllers\StoreController@create']);
        Route::get('/{store_id}/edit',                          ['as'=>'stores.edit',    'uses'=>'App\Http\Controllers\StoreController@edit']);
    });
    
    // Stores open role routes
    Route::group(['prefix' => 'stores'], function () {
        Route::get('/{store_id}',                               ['as'=>'stores.show',    'uses'=>'App\Http\Controllers\StoreController@show']);
        Route::post('/',                                        ['as'=>'stores.store',   'uses'=>'App\Http\Controllers\StoreController@store']);
        Route::match(['put', 'patch'], '/{store_id}',           ['as'=>'stores.update',  'uses'=>'App\Http\Controllers\StoreController@update']);
        Route::delete('/{store_id}',                            ['as'=>'stores.destroy', 'uses'=>'App\Http\Controllers\StoreController@destroy']);
    });

    // Products
    Route::group(['prefix' => 'products', 'middleware' => 'role:admin'], function () {
        Route::get('/create',                                   ['as'=>'products.create',  'uses'=>'App\Http\Controllers\ProductController@create']);
        Route::get('/{product_id}/edit',                        ['as'=>'products.edit',    'uses'=>'App\Http\Controllers\ProductController@edit']);
    });
    // Products open role routes
    Route::group(['prefix' => 'products'], function () {
        Route::get('/',                                         ['as'=>'products.index',   'uses'=>'App\Http\Controllers\ProductController@index']);
        Route::post('/',                                        ['as'=>'products.store',   'uses'=>'App\Http\Controllers\ProductController@store']);
        Route::get('/{product_id}',                             ['as'=>'products.show',    'uses'=>'App\Http\Controllers\ProductController@show']);
        Route::match(['put', 'patch'], '/{product_id}',         ['as'=>'products.update',  'uses'=>'App\Http\Controllers\ProductController@update']);
        Route::delete('/{product_id}',                          ['as'=>'products.destroy', 'uses'=>'App\Http\Controllers\ProductController@destroy']);
    });

    // Delivery Infos
    Route::group(['prefix' => 'delivery-infos', 'middleware' => 'role:admin'], function () {
        Route::get('/',                                         ['as'=>'deliveryInfos.index',   'uses'=>'App\Http\Controllers\DeliveryInfoController@index']);
        Route::get('/create',                                   ['as'=>'deliveryInfos.create',  'uses'=>'App\Http\Controllers\DeliveryInfoController@create']);
        Route::get('/{delivery_info_id}',                       ['as'=>'deliveryInfos.show',    'uses'=>'App\Http\Controllers\DeliveryInfoController@show']);
        Route::get('/{delivery_info_id}/edit',                  ['as'=>'deliveryInfos.edit',    'uses'=>'App\Http\Controllers\DeliveryInfoController@edit']);
    });
    // Delivery open role routes
    Route::group(['prefix' => 'delivery-infos'], function () {
        Route::post('/',                                        ['as'=>'deliveryInfos.store',   'uses'=>'App\Http\Controllers\DeliveryInfoController@store']);
        Route::match(['put', 'patch'], '/{delivery_info_id}',         ['as'=>'deliveryInfos.update',  'uses'=>'App\Http\Controllers\DeliveryInfoController@update']);
        Route::delete('/{delivery_info_id}',                          ['as'=>'deliveryInfos.destroy', 'uses'=>'App\Http\Controllers\DeliveryInfoController@destroy']);
    });

    // Orders
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/',                                         ['as'=>'orders.index',   'uses'=>'App\Http\Controllers\OrderController@index']);
        Route::get('/create',                                   ['as'=>'orders.create',  'uses'=>'App\Http\Controllers\OrderController@create']);
        Route::post('/',                                        ['as'=>'orders.store',   'uses'=>'App\Http\Controllers\OrderController@store']);
        Route::get('/{order_id}',                               ['as'=>'orders.show',    'uses'=>'App\Http\Controllers\OrderController@show']);
        Route::match(['put', 'patch'], '/{order_id}',           ['as'=>'orders.update',  'uses'=>'App\Http\Controllers\OrderController@update']);
        Route::delete('/{order_id}',                            ['as'=>'orders.destroy', 'uses'=>'App\Http\Controllers\OrderController@destroy']);
        Route::get('/{order_id}/edit',                          ['as'=>'orders.edit',    'uses'=>'App\Http\Controllers\OrderController@edit']);
    });

    // Payments
    Route::group(['prefix' => 'payments', 'middleware' => 'role:admin'], function () {
        Route::get('/',                                         ['as'=>'payments.index',   'uses'=>'App\Http\Controllers\PaymentController@index']);
        Route::get('/create',                                   ['as'=>'payments.create',  'uses'=>'App\Http\Controllers\PaymentController@create']);
        Route::post('/',                                        ['as'=>'payments.store',   'uses'=>'App\Http\Controllers\PaymentController@store']);
        Route::get('/{payment_id}',                             ['as'=>'payments.show',    'uses'=>'App\Http\Controllers\PaymentController@show']);
        Route::match(['put', 'patch'], '/{payment_id}',         ['as'=>'payments.update',  'uses'=>'App\Http\Controllers\PaymentController@update']);
        Route::delete('/{payment_id}',                          ['as'=>'payments.destroy', 'uses'=>'App\Http\Controllers\PaymentController@destroy']);
        Route::get('/{payment_id}/edit',                        ['as'=>'payments.edit',    'uses'=>'App\Http\Controllers\PaymentController@edit']);
    });

    // Transfers Infos
    Route::group(['prefix' => 'transfers', 'middleware' => 'role:admin'], function () {
        Route::get('/',                                         ['as'=>'buyerTransfers.index',   'uses'=>'App\Http\Controllers\BuyerTransferController@index']);
        Route::get('/create',                                   ['as'=>'buyerTransfers.create',  'uses'=>'App\Http\Controllers\BuyerTransferController@create']);
        Route::post('/',                                        ['as'=>'buyerTransfers.store',   'uses'=>'App\Http\Controllers\BuyerTransferController@store']);
        Route::get('/{transfer_id}',                            ['as'=>'buyerTransfers.show',    'uses'=>'App\Http\Controllers\BuyerTransferController@show']);
        Route::match(['put', 'patch'], '/{transfer_id}',        ['as'=>'buyerTransfers.update',  'uses'=>'App\Http\Controllers\BuyerTransferController@update']);
        Route::delete('/{transfer_id}',                         ['as'=>'buyerTransfers.destroy', 'uses'=>'App\Http\Controllers\BuyerTransferController@destroy']);
        Route::get('/{transfer_id}/edit',                       ['as'=>'buyerTransfers.edit',    'uses'=>'App\Http\Controllers\BuyerTransferController@edit']);
    });
});