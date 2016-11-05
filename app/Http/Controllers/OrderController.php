<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function address() {
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
