<?php

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

// General
Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{id}', 'HomeController@product')->name('product');
Route::get('/category', 'HomeController@category')->name('category');

// Auth
Route::get('/auth', 'AuthController@index')->name('auth');
Route::post('/register', 'AuthController@register')->name('register');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

// User
Route::get('/dashboard', 'UserController@index')->name('dashboard');
Route::prefix('orders')->group(function() {
    Route::get('/', 'UserController@orders')->name('orders');
    Route::get('/{id}/delete', 'UserController@deleteOrders')->name('orders.delete');
});

// Admin
Route::prefix('products')->group(function() {
    Route::get('/', 'AdminController@products')->name('products.index');
    Route::get('/add', 'AdminController@addProducts')->name('products.add');
    Route::post('/store', 'AdminController@storeProducts')->name('products.store');
    Route::get('/{id}/edit', 'AdminController@editProducts')->name('products.edit');
    Route::put('/{id}', 'AdminController@updateProducts')->name('products.update');
    Route::get('/{id}/delete', 'AdminController@deleteProducts')->name('products.delete');
    Route::get('/category', 'AdminController@productsCategory')->name('products.category.index');
    Route::get('/category/add', 'AdminController@addProductsCategory')->name('products.category.add');
    Route::post('/category/store', 'AdminController@storeProductsCategory')->name('products.category.store');
    Route::get('/category/{id}/edit', 'AdminController@editProductsCategory')->name('products.category.edit');
    Route::put('/category/{id}', 'AdminController@updateProductsCategory')->name('products.category.update');
    Route::get('/category/{id}/delete', 'AdminController@deleteProductsCategory')->name('products.category.delete');
});
Route::get('/order-user', 'AdminController@orderUser')->name('order-user');

// Cart
Route::prefix('cart')->group(function() {
    Route::get('/', 'CartController@index')->name('cart');
    Route::post('/add', 'CartController@addCart')->name('cart.add');
    Route::post('/update', 'CartController@updateCart')->name('cart.update');
    Route::get('{id}/remove', 'CartController@removeCart')->name('cart.remove');
});

// Checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@addCheckout')->name('checkout.add');