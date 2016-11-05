@extends('layout')

@section('content')
<div class="container">
    <h1>Sign up</h1>
	<form action="/signup" method="POST">
		<div>First Name: <input type="text" name="first_name" class="form-control"></div>
		<div>Last Name: <input type="text" name="last_name" class="form-control"></div>
		<div>Phone: <input type="text" name="phone" class="form-control"></div>
		<div>Address: <input type="text" name="address" class="form-control"></div>
		<div>Email: <input type="text" name="email" class="form-control"></div>
		<div>Password: <input type="password" name="password" class="form-control"></div>
		<br>
		<button type="submit" class="btn btn-primary" >Sign up</button> 
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</div>
@stop