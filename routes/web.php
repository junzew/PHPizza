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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function() {
    return view('login');
});

Route::post('/login', 'LoginController@login'); // TODO

Route::get('/order/address', function() {
	return view('address');
});

Route::post('/order/address', 'OrderController@address'); // TODO

Route::get('/order/menu', function() {
	return view('menu');
});

Route::get('/order/menu/item/{id}', function() {
	return view('menuitem');
});

Route::get('/order/review', function() {
	// TODO
});

Route::put('/order/submit', 'OrderController@submit'); // TODO

Route::put('/order/cancel', 'OrderController@cancel'); // TODO

Route::get('/order/status', function() {
	// TODO
});

Route::put('order/item/{id}', 'OrderController@add');

Route::delete('order/item/{id}', 'OrderController@delete');

Route::get('/signup', function() {

});

Route::post('/signup', 'SignUpController@signup');

