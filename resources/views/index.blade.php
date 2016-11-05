@extends('layout')

@section('content')
<div class="container">
		<h1> Welcome to <img src="{{URL::asset('/image/phpizza.png')}}" alt="logo Pic" height="80" width="160" "> !</h1>
		<hr>
        <h3><a href="/order/address">Order pizza</a><br></h3>
        <h3><a href="/login">Login</a><br></h3>
        <h3><a href="/signup">Sign Up</a><br></h3>
</div>

@stop
