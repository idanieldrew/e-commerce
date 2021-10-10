<?php

use Illuminate\Support\Facades\Route;

// landing page
Route::get('/', 'LandingPageController@index')->name('land-page');

// products page
Route::get('/shop', 'ShopController@index')->name('shop-page');

// single product
Route::get('/shop/{id}', 'ShopController@show')->name('special-product');

Route::prefix('cart')->middleware('auth')->group(function () {
    // cart page
    Route::get('/cart', 'CartController@index')->name('cart.index');

    // add product
    Route::post('/cart', 'CartController@store')->name('cart-store');
});

// remove a product with rowId
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart-destroy');

// add save for later and add instance
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.SaveForLater');

// remove a product in save for later with rowId
Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('SaveForLater.destroy');

// add product to save for later
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('SaveForLater.switchToCart');

// checkout page
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

// submit stores in checkout
Route::post('/checkout', 'CheckOutController@store')->name('checkout.store');

// edit product was store
Route::patch('/cart/{id}', 'CartController@update')->name('cart.update');

// add coupon
Route::post('/coupon', 'CouponController@store')->name('coupon.store');

// remove coupon
Route::delete('remove-coupon', 'CouponController@destroy')->name('coupon.destroy');

// serch products
Route::get('/search', 'shopController@search')->name('shop.search');

// live search
Route::get('/searches', 'shopController@searches')->name('shop.searches');

// panel admin with voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// auth with laravel ui
Auth::routes();
