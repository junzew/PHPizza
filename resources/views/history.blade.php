@extends('layout')
@section('content')
<div class="container">
	<h1>Your order history:</h1>
	<?php 
	$num_of_orders = 0;
    while($row = mysqli_fetch_array($history, MYSQLI_ASSOC)) {
    	$status = '';
    	if ($row['status'] == 1) {
    		$status = 'completed';
    	} elseif ($row['status'] == 0) {
    		$status = 'uncompleted';
    	}
    	echo 'Order id: '.$row['order_id'].' Order date: '.$row['order_date'].' Status: '.$status.'<br>';	
    	$num_of_orders++;
    }
    if($num_of_orders == 0) {
    	echo 'No record';
    }
?>
</div>

@stop