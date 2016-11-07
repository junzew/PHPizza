<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
    	$email = $_POST["email"];
    	$password = $_POST["password"];

    	$query = "SELECT COUNT(*) as count FROM member WHERE email = '$email' ";
      $result = $this->db->query($query);
    	$row = mysqli_fetch_array($result);

    	$url = '/user'; // redirect to menu page by default
    	$message = 'Login success';
    	// User does not exist in database
    	if ($row["count"] == 0) {
    		$message = "You haven't signed up for membership.";
    		$url = '/login';
    	} else {
    		// verify password
    		$query = "SELECT COUNT(*) as count FROM member WHERE email = '$email' AND password = '$password' ";
    		$result = $this->db->query($query);
    		$row = mysqli_fetch_array($result);

    		if ($row['count'] == 0) {
    			$url = '/login';
    			$message = "Wrong password.";
    		} else {
          // get phone number of member
          $query = "SELECT phone FROM member WHERE email = '$email' AND password = '$password' ";
          $result = $this->db->query($query);
          $row = mysqli_fetch_array($result);
          $url .= '/'.$row['phone'];
          echo $url;
        }
    	}

    	return redirect($url)->with('message', $message);
    }
}
