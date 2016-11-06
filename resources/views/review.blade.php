@extends('layout')
@section('content')
<div class="container">
<h1>Please review your order:</h1>
	<table border="1">
	<thead>
		<tr>
			<td>Pizza Type</td>
			<td>Price</td>
			<td>Pizza Quantity</td>
		</tr>
	</thead>
	<tbody>
	
			<?php
			// echo print_r($_POST);
			$total_price = 0;
			$pizza_sub_total_price = 0;
			$total_pizza_quantity = 0;
				for ($i=0; $i < count($_POST['pizza']) ; $i++) { 
					if ($_POST['pizzaquantity'][$i] != 0) {
						echo '<tr><td>'
						.$_POST['pizza'][$i].'</td><td>'
						.$_POST['price'][$i].'</td><td>'
						.$_POST['pizzaquantity'][$i].'</td></tr>';
						$pizza_sub_total_price += $_POST['price'][$i]*$_POST['pizzaquantity'][$i];
						$total_pizza_quantity += $_POST['pizzaquantity'][$i];
					}
				}
			?>
	</tbody>

	</table>
	<?php echo "Pizza subtotal: ".$pizza_sub_total_price." $ <br>";
	?>
	<hr>
	<table>
		<tbody>
		<?php

	$topping_types = $_POST['topping_types'];
  if(empty($topping_types)) 
  {
    echo("You didn't select any toppings.");
  } 
  else
  {
    $N = count($topping_types);
 
    echo("You selected $N toppings(s):<br> ");
    // for($i=0; $i < $N; $i++)
    // {
    //   echo($topping_types[$i] . "<br> ");
    // }
  }

// echo "all ids";
// 		for ($i=0; $i < count($_POST['topping_id']); $i++) { 
// 			echo '<tr><td>'
// 			.$_POST['topping_id'][$i].'</td></tr>';
// 		}
  // Get the corresponding quantity
  	$topping_sub_total = 0;
		while($row = mysqli_fetch_array($selected_toppings, MYSQLI_ASSOC)) {
			$topping_id = $row['topping_id'];
			$topping_quantity = 0;
			for ($i=0; $i < count($_POST['topping_quantity']); $i++) { 
				$values = explode(',', $_POST['topping_quantity'][$i]);
				$quantity = $values[0];
				$id = $values[1];
				if ($topping_id == $id) {
					$topping_quantity = $quantity;
					break;
				}
			}
			echo $row['topping'].' '.$row['price'].' '.$topping_quantity.'<br>';
			$topping_sub_total += $row['price'] * $topping_quantity;
		}
		echo "on top of: ". $total_pizza_quantity .' pizzas<br>';
		$topping_sub_total *= $total_pizza_quantity;
		echo 'Topping subtotal: '.$topping_sub_total.' $ <br>';
		
		$total_price = $topping_sub_total + $pizza_sub_total_price;
		
		?>
		</tbody>
	</table>
	

	<hr>
	Total price:
	<?php 
		echo $total_price.' $<br>';
	?>
	<br><a href="#" class="btn btn-primary">Confirm Order</a>

</div>


@stop