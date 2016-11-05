<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignUpController extends Controller
{
    //
    public function signup() {
    	// Get the variables in the submitted form
    	$phone = $_POST['phone'];
    	$address = $_POST['address'];
    	$first_name = $_POST['first_name'];
    	$last_name = $_POST['last_name'];
    	$email = $_POST['email'];
    	$password = $_POST['password'];
    	
    	// First check if we have the user's information in the database
    	$dbc = mysqli_connect('localhost',"root", "","phpizza") or die('Error connect');
    	$query = "SELECT COUNT(*) AS count FROM customer WHERE customer.phone = '$phone' ";
    	$result = mysqli_query($dbc, $query) or die('error');
    	$row = mysqli_fetch_array($result);
		
		// create a customer if no record in database about the customer
    	if ($row['count'] == 0) {
	    	$query = "INSERT INTO customer (phone, address, first_name, last_name) VALUES(
	    	'$phone', '$address', '$first_name', '$last_name')";
	    	mysqli_query($dbc, $query) or die('error creating customer');
    	}

    	// Also check if we already have the member info in the database
    	$query = "SELECT COUNT(*) AS count FROM member WHERE member.phone = '$phone' ";
    	$result = mysqli_query($dbc, $query) or die('error');
    	$row = mysqli_fetch_array($result);
    	if ($row['count'] == 0) {
	    	// also create member
			$query = "INSERT INTO member(phone, points, email, password) VALUES(
			'$phone',0,'$email','$password' )";
			mysqli_query($dbc, $query) or die('error creating member');
			echo 'Congratulations! Member creation success.<br>';
    	} else {
    		echo "You've already signed up.<br>";
    	}
		mysqli_close($dbc);
		echo '<a href="/login">Log in</a>';
    	//return redirect('/login');
    }
}
