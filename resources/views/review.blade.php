@extends('layout')
@section('content')
<div class="container">
<h1>Please review your order:</h1>
	<table border="1">
	<thead>
		<tr>
			<td>Pizza</td>
			<td>Price</td>
			<td>Quantity</td>
		</tr>
	</thead>
	<tbody>
			<?php
				for ($i=0; $i < count($_POST['pizza']) ; $i++) { 
					echo '<tr><td>'
					.$_POST['pizza'][$i].'</td><td>'
					.$_POST['price'][$i].'</td><td>'
					.$_POST['quantity'][$i].'</td></tr>';
				}
			?>
	</tbody>

	</table>
	<br>
	<a href="#" class="btn btn-primary">Confirm</a>
</div>


@stop