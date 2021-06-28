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

// main page
Route::get('/', 'LandingPageController@index')->name('land-page');

// more products page
Route::get('/shop', 'ShopController@index')->name('shop-page');

// one product with special id
Route::get('/shop/{id}', 'ShopController@show')->name('special-product');

// cart page
Route::get('/cart', 'CartController@index')->name('cart.index');

// submit a product
Route::post('/cart', 'CartController@store')->name('cart-store');

// remove a product wwith rowId
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart-destroy');

// add save for later and add instance
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.SaveForLater');


Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('SaveForLater.destroy');


Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('SaveForLater.switchToCart');


Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

Route::post('/checkout', 'CheckOutController@store')->name('checkout.store');


Route::patch('/cart/{id}', 'CartController@update')->name('cart.update');


Route::post('/coupon', 'CouponController@store')->name('coupon.store');


Route::delete('remove-coupon', 'CouponController@destroy')->name('coupon.destroy');

// serch products
Route::get('/search', 'shopController@search')->name('shop.search');

Route::get('/searches', 'shopController@searches')->name('shop.searches');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
