<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function refresh() {
    	if (!empty($_POST['branch'])) {
  			$branch = $_POST['branch'];
  		} else {
  			$branch = '101'; // default
  		}

  		$query = "SELECT * FROM branch";
      $branches = $this->db->query($query);

  		// Display the pizza options available at selected branch
  		$query = "SELECT pt.name AS pizza, mi.price AS price, pt.description AS description
  		  FROM MenuItem mi, PizzaType pt
  		  WHERE branch_id = '$branch' AND mi.type_id = pt.type_id";

      $options = $this->db->query($query);

  		// Query toppings
      $query = "SELECT topping_id, price, t_name AS topping FROM toppingitem";
      $toppings = $this->db->query($query);

  		return view('menu', compact('branch', 'branches', 'options', 'toppings'));
    }
}
