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
    	$query = "SELECT COUNT(*) AS count FROM customer WHERE customer.phone = '$phone' ";
      $result = $this->db->query($query);
    	$row = mysqli_fetch_array($result);

		  // create a customer if no record in database about the customer
    	if ($row['count'] == 0) {
	    	$query = "INSERT INTO customer (phone, address, first_name, last_name) VALUES(
	    	'$phone', '$address', '$first_name', '$last_name')";

        $this->db->query($query);
    	}

    	// Also check if we already have the member info in the database
    	$query = "SELECT COUNT(*) AS count FROM member WHERE member.phone = '$phone' ";
      $result = $this->db->query($query);
    	$row = mysqli_fetch_array($result);

    	if ($row['count'] == 0) {
	    	// also create member
  			$query = "INSERT INTO member(phone, points, email, password) VALUES(
  			'$phone',0,'$email','$password' )";

        $this->db->query($query);

  			echo 'Congratulations! Member creation success.<br>';
    	} else {
    		echo "You've already signed up.<br>";
    	}

		  echo '<a href="/login">Log in</a>';
    	//return redirect('/login');
    }
}
