<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function address() {
        // insert the customer info into
        // $dbc = mysqli_connect('localhost',"root", "","phpizza") or die('Error connect');
        // $query = "";
        // $result = mysqli_query($dbc, $query) or die('Error querying database.');
        // mysqli_close($dbc);
        return redirect('/order/menu');
    }
    public function cancel() {
    	return request()->all();
    }
    public function submit() {
    	return request()->all();
    }
    public function add() {
    	return request()->all();
    }
    public function delete() {
		return request()->all();    	
    }
}
