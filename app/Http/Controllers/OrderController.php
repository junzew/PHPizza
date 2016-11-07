<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller {

    public function address() {
        // insert the customer info into
        // $dbc = mysqli_connect('localhost',"root", "","phpizza") or die('Error connect');
        // $query = "";
        // $result = mysqli_query($dbc, $query) or die('Error querying database.');
        // mysqli_close($dbc);
        return redirect('/order/menu');
    }

    public function review() {

      $selected_toppings = [];

      if (!empty($_POST['topping_types'])) {

        $selected_topping_id = $_POST['topping_types'];

        $ids = '';
        for ($i=0; $i < count($selected_topping_id) ; $i++) {
          $ids .= $selected_topping_id[$i];
          if ($i != count($selected_topping_id) - 1) {
            $ids.= ',';
          }
        }

        $query = 'SELECT topping_id, price, t_name AS topping FROM toppingitem WHERE topping_id IN ('.$ids.' )';

        $selected_toppings = $this->db->query($query);

      }

      return view('review', compact('selected_toppings'));
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
