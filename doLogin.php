<?php

session_start();

include_once dirname(__FILE__) ."/includes/db_connect.php";
include_once dirname(__FILE__) ."/includes/functions.php";

// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace.
    $username = strip_tags(trim($_POST["username"]));
			$username = str_replace(array("\r","\n"),array(" "," "),$username);
    $password = $_POST["password"];

    if ( empty($username) OR empty($password)) {
        // Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Oops! There was a problem logging in. Please try again.";
        exit;
    }

	// Check connection
	if ($conn->connect_error) {
		http_response_code(500);
	    echo "Error: Could not connect to server. Please try again.";
	}
	else {
		$success = login($username, $password, $conn);
		if ($success){
		
			session_write_close();
		
			// Set a 200 (okay) response code.
			http_response_code(200);
			echo "You have been successfully logged in!";
		}
		else{
			// Set a 400 (bad request) response code.
			http_response_code(400);
			echo "The username and password you entered are incorrect.";
		}
	}

} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission. Please try again.";
}

/*
$username = $password = '';

$username = trim(htmlspecialchars($_POST['username']));
$password = htmlspecialchars($_POST['password']);

// Check connection
if ($conn->connect_error) {
    echo "Error: Could not connect to server.";
}
else {
	$success = login($username, $password, $conn);
	if ($success){
		echo "true";
	}
	else{
		echo "false";
	}
}
*/

?>