<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login() {
    	$email = $_POST["email"];
    	$password = $_POST["password"];
    	$dbc = mysqli_connect('localhost',"root", "","phpizza") or die('Error connect');
    	$query = "SELECT COUNT(*) as count FROM member WHERE email = '$email' ";
    	$result = mysqli_query($dbc, $query) or die('error');
    	$row = mysqli_fetch_array($result);
    	$url = '/user'; // redirect to menu page by default
    	$message = 'Login success';
    	// User does not exist in database
    	if ($row["count"] == 0) {
    		echo 'DNE';
    		$message = "You haven't signed up for membership.";
    		$url = '/login';
    	} else {
    		// verify password
    		$query = "SELECT COUNT(*) as count FROM member WHERE email = '$email' AND password = '$password' ";
    		$result = mysqli_query($dbc, $query) or die('error');
    		$row = mysqli_fetch_array($result);
    		if ($row['count'] == 0) {
    			$url = '/login';
    			$message = "Wrong password.";
    		}
    	}
		mysqli_close($dbc);
    	return redirect($url)->with('message', $message);
    }
}
