@extends('layout')
@section('content')
<div class="container">
	<h1>Login</h1>
		@if (session('message'))
		    <div class="alert alert-danger">
		        {{ session('message') }}
		    </div>
		@endif
	<form action="/login" method="POST">
		<div>Email: <input type="text" name="email"></div>
		<div>Password: <input type="password" name="password"></div>
		<button type="submit" class="btn btn-primary">Log in</button> 
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</div>

@stop