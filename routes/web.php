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
Route::get('/order/menu', 'MenuController@refresh');

Route::post('/order/menu/', 'MenuController@refresh');

// display details of a menu item
Route::get('/order/menu/item/{id}', function() {
	return view('menuitem');
});

// review order
Route::post('/order/review', 'OrderController@review');

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


Route::get('/user/{phone}', function($phone) {
	$dbc = mysqli_connect('localhost',"root", "","phpizza") or die('Error connect');
	$query = "SELECT m.points, m.email, c.first_name FROM member m, customer c WHERE m.phone = '$phone' AND c.phone = m.phone";
    $result = mysqli_query($dbc, $query) or die('error');
    $row = mysqli_fetch_array($result);
    $points = $row['points'];
    $email = $row['email'];
    $first_name = $row['first_name'];
	mysqli_close($dbc);
	return view('user', compact('points', 'email', 'first_name', 'phone'));
});

Route::get('/user/{phone}/history', function($phone) {
	$dbc = mysqli_connect('localhost',"root", "","phpizza") or die('Error connect');
	$query = "SELECT order_id, order_date, status FROM orderlist WHERE phone = '$phone' ";
    $history = mysqli_query($dbc, $query) or die('error');
    mysqli_close($dbc);
    return view('history', compact('history'));

});

