@extends('layout')

@section('content')
<div class="container">
    <h1>Menu</h1>

	<!-- display list of selectable branches -->
	<form action="/order/menu/" method="POST" class="form-inline">
		<select name="branch">
		<?php
		while($row = mysqli_fetch_array($branches)) {
			if ($row['branch_id'] == $branch) {
				echo '<option value="'.$row['branch_id'].'" selected="selected">'.$row['name'].'</option>';
			} else {
				echo '<option value="'.$row['branch_id'].'">'.$row['name'].'</option>';
			}
		}
		?>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</select>
		<button type="submit" class="btn btn-sm" >switch branch</button>
	</form>
	<hr>
	<label>Pizza</label>
	<form action="/order/review" method="POST">
		<table border="1">
			<thead>
				<tr>
					<td> Flavor </td>
					<td> Price($) </td>
					<td> Description </td>
					<td> Quantity </td>
				</tr>
			</thead>
			<tbody>
			<?php
				while($row = mysqli_fetch_array($options, MYSQLI_ASSOC)) {
					echo '<tr>
					<td>'.$row['pizza'].'<input type="hidden" name="pizza[]" value="'.$row['pizza'].' "></td>
					<td>'.$row['price'].'<input type="hidden" name="price[]" value="'.$row['price'].' "></td>
					<td>'.$row['description'].'</td>
					<td><input type="number" name="pizzaquantity[]" value="0"></td>
					</tr>';
				}
			?>


			</tbody>
		</table>
		<label>Extra Topping</label>
		<br>Type:  ------------Price:--------- Quantity:<br>
		<!-- <select name="extra_topping_type"> -->
			<!-- <option>None</option> -->
				<?php
				/*
				Consider this: if a user is about to order 1000 pepperoni pizza, 
				should the user be asked to select the extra toppings for each of the 1000 pizzas? 
				(That would be painful), so I'll just make the assumption that toppings and corresponding quantities
				the user choose will apply to every one of the pizzas.
				*/
					while($row = mysqli_fetch_array($toppings)) {
						//echo '<option value="'.$row['topping_id'].'">'.$row['topping'].' '.$row['price'].'</option>';
						echo '<input type="checkbox" name= "topping_types[]" value="'.$row['topping_id'].'">'.' '.$row['topping'].' '.$row['price'].' ';
						echo '<input type="hidden" name=topping_id[] value="'.$row['topping_id'].'">';
						echo '<input type="hidden" name=topping_name[] value="'.$row['topping'].'">';
						echo '<input type="hidden" name=topping_price[] value="'.$row['price'].'">';
						echo '<select name="topping_quantity[]">
						 <option value="0,'.$row['topping_id'].'" seleced> None </option> 
						 <option value="1,'.$row['topping_id'].'"> Single </option> 
						 <option value="2,'.$row['topping_id'].'"> Double </option> 
						 <option value="3,'.$row['topping_id'].'"> Tripple </option> 
						 </select><br>';
					}
				?>
		<!-- </select> -->


		<small>Note: the topping type and quantity apply to every one of ordered pizzas.</small><br>

		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<hr>
		<button type="submit" class="btn btn-primary">Order and pay</button>
	</form>
</div>
@stop