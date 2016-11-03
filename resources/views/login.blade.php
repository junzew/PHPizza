@extends('layout')
@section('content')
<form action="/login" method="POST">
	<div>Username: <input type="text" name="username"></div>
	<div>Password: <input type="password" name="password"></div>
	<input type="submit" name="submit">
</form>
@stop