@extends('layout')

@section('content')
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {

    $('#signupform').validate({ // initialize the plugin
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            phone: {
            	required: true
            },
            address: {
            	required: true
            },
            email: {
            	required: true,
            	email: true
            },
            password :{
            	required:true,
            	minlength: 6
            }
        },
        messages: {
        	first_name: "Please enter your first name",
        	last_name: "Please enter your last name",
        	password: "Password must be at least 6 characters long",
        	email: "Please provide a valid email address"
        }
    });
});
</script>
<div class="container">
    <h1>Sign up</h1>
	<form id="signupform" action="/signup" method="POST">
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