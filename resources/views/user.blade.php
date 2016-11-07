@extends('layout')
@section('content')
    @if (session('message'))
	    <div class="alert alert-success">
	        {{ session('message') }}
	    </div>
	@endif
	<div class="container">
		<h1>Welcome <?php echo $first_name; ?></h1>
		<label>Account profile</label><br>
		<?php 
			echo 'Phone: '.$phone."<br>";
			echo 'Email: '.$email."<br>";
			echo 'Membership points: '.$points."<br>";
		?>
		<h2> You can now:</h2>
		<a href="/order/menu">Place new order</a><br>
		<?php echo '<a href="/user/'.$phone.'/history">View your order history<br>' ?>
	</div>
@stop