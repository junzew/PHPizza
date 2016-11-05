@extends('layout')
@section('content')
    @if (session('message'))
	    <div class="alert alert-success">
	        {{ session('message') }}
	    </div>
	@endif
	<div class="container">
		<h1>Welcome</h1>
		<h2> You can now:</h2>
		<a href="/order/menu">Place new order</a><br>
		<a href="#">View membership points<br>
		<a href="#">View your order history<br>
	</div>
@stop