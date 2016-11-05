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
	<input type="submit" value="switch city" class="btn">
	</form>
	<hr>
	// TODO
	<form action="#" method="POST">
		<table border="1">
			<thead><tr><td> Flavor </td><td> Price($) </td><td> Description </td><td>Quantity</td></tr></thead>
			<tbody>
			<?php
				while($row = mysqli_fetch_array($options, MYSQLI_ASSOC)) {
					echo '<tr>
					<td>'.$row['pizza'].'</td>
					<td>'.$row['price'].'</td>
					<td>'.$row['description'].'</td>
					<td><input type="number" name="quantity"></td>
					</tr>';
				}
			?>
			</tbody>
		</table>
	</form>



	<button type="submit">Confirm order</button>
</div>
@stop