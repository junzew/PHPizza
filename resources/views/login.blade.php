@extends('layout')
@section('content')
<div class="container">
	<h1>Login page</h1>
	<form action="/login" method="POST">
		<div>Username: <input type="text" name="username"></div>
		<div>Password: <input type="password" name="password"></div>
		<button type="submit" class="btn btn-primary">Log in</button> 
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</div>

@stop