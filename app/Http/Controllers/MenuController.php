<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    //

    public function refresh() {
    	if (!empty($_POST['branch'])) {
			$branch = $_POST['branch'];		
		} else {
			$branch = '101'; // default
		}
		$dbc = mysqli_connect('localhost',"root", "","phpizza") or die('Error connect');
		
		// Query all branches
		$query = "SELECT * FROM branch";
		$branches = mysqli_query($dbc, $query) or die('Error querying database.');
		
		// Display the pizza options available at selected branch
		$query = "SELECT pt.name AS pizza, mi.price AS price, pt.description AS description
		FROM MenuItem mi, PizzaType pt
		WHERE branch_id = '$branch' AND mi.type_id = pt.type_id";
		$options = mysqli_query($dbc, $query) or die('Error querying database.');

		// Query toppings
		$dbc = mysqli_connect('localhost',"root", "","phpizza") or die('Error connect');
        $query = "SELECT topping_id, price, t_name AS topping FROM toppingitem";
        $toppings = mysqli_query($dbc, $query) or die('Error querying database.');
        
        mysqli_close($dbc);
		return view('menu', compact('branch', 'branches', 'options', 'toppings'));
    }
}
