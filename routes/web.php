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

// index
Route::get('/', function () {
    return view('index');
});

// login page
Route::get('/login', function() {
    return view('login');
});

// submit login info
Route::post('/login', 'LoginController@login'); // TODO

// display address form
Route::get('/order/address', function() {
	return view('address');
});

// submit address form
Route::post('/order/address', 'OrderController@address'); // TODO

// display menu
Route::get('/order/menu', function() {
	return view('menu');
});

// display details of a menu item
Route::get('/order/menu/item/{id}', function() {
	return view('menuitem');
});

// review order
Route::get('/order/review', function() {
	// TODO
});

// submit order
Route::put('/order/submit', 'OrderController@submit'); // TODO

// cancel order
Route::put('/order/cancel', 'OrderController@cancel'); // TODO

// display order status
Route::get('/order/status', function() {
	// TODO
});

// add an item to an order
Route::put('order/item/{id}', 'OrderController@add');

// delete an item from an order
Route::delete('order/item/{id}', 'OrderController@delete');

// display sign up page
Route::get('/signup', function() {
	return view('signup');
});

Route::post('/signup', 'SignUpController@signup');

