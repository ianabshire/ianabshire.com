
<?php
function login($uname, $password, $mysqli) {  // login function
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT id, username, email, password, admin, inactive
        FROM members
       WHERE username = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $uname);  // Bind "$uname" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $email, $db_password, $admin, $inactive);
        $stmt->fetch();
 
        if ($stmt->num_rows == 1) {  // if user exists

                // Check if the password in the database matches the password the user submitted.
                if ($db_password == $password) {
                    // Password is correct
                    // Add variables to SESSION for use later
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                    $_SESSION['username'] = $username;
                    
                    filter_var($email, FILTER_VALIDATE_EMAIL);
                    $_SESSION['email'] = $email;
                    
                    $_SESSION['password'] = $password;
                    $_SESSION['user_login_status'] = 1;
                    
                    if ($inactive){						// If user account is inactive, set SESSION flag
			            $_SESSION['inactive'] = 1;
			        }
		            else {
		            	$_SESSION['inactive'] = 0;
		            }
                    
                    if ($admin){						// If user is admin, set SESSION flag
			            $_SESSION['admin_status'] = 1;
			        }
		            else {
		            	$_SESSION['admin_status'] = 0;
		            }
                    
                    log_activity("Logged_In", $mysqli);  // Log the login activity
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    return false;
                }
            //}
        } else {
            // No user exists.
            return false;
        }
    }
}

function register($username, $email, $password, $mysqli){  // register function
	
	// Attempt to select user
	if ($stmt = $mysqli->prepare("SELECT username
        FROM members
        WHERE username = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $username);  // Bind "$email" to parameter
        $stmt->execute();    // Execute the prepared query
        $stmt->store_result();
 
        // Get variables from result
        $stmt->bind_result($uname);
        $stmt->fetch();
        
        if ($stmt->num_rows == 0){  // If user doesn't already exist
	        
	        $stmt_in = $mysqli->prepare("INSERT INTO members (username, email, password) VALUES (?, ?, ?)");  // Insert user into table
			$stmt_in->bind_param("sss", $username, $email, $password);
			$stmt_in->execute();
			
			$stmt_get = $mysqli->prepare("SELECT id FROM members WHERE username = ? LIMIT 1");  // get the user's id number from server
			$stmt_get->bind_param('s', $username);  // Bind "$email" to parameter
	        $stmt_get->execute();    // Execute the prepared query
	        $stmt_get->store_result();
	 
	        // get variables from result
	        $stmt_get->bind_result($user_id);
	        $stmt_get->fetch();
	        
	        // Store user's info into SESSION for use later
	        $_SESSION['user_id'] = $user_id;
	        $_SESSION['username'] = $username;
	        $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['user_login_status'] = 1;
            $_SESSION['inactive'] = 0;
            $_SESSION['admin_status'] = 0;
	        
	        log_activity('Registered_User', $mysqli);  // Log the registration
			return true;
        }
        else{
	        return false;
        }
    }	
}

function update($key, $value, $mysqli){  // update function
	
	// update the table key with the new value
	$stmt = $mysqli->prepare("UPDATE members SET $key = ? WHERE id = ?");
	$stmt->bind_param("sd", $value, $_SESSION['user_id']);
	$stmt->execute();
	
	$_SESSION[$key] = $value;  // Change the SESSION var to the nex value
	log_activity('Updated_Info', $mysqli);  // Log the update
}

function log_activity($activity, $mysqli){  // log function
	
	// Insert the activity into the log table with user info
	$stmt = $mysqli->prepare("INSERT INTO log (username, id, activity) VALUES (?, ?, ?)");
	$stmt->bind_param("sds", $_SESSION['username'], $_SESSION['user_id'], $activity);
	$stmt->execute();
}

function doLogout($mysqli){  // called when user logs out

		log_activity("Logged_Out", $mysqli);  // Log the logout
        $_SESSION = array();  // delete the session of the user
        session_destroy();
}

function isUserLoggedIn(){  // check if a user is logged in

		// checks the login status flag of the SESSION
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
}

function deactivate($mysqli){ // deactivate user account
	
	if(isUserLoggedIn()){
		
		// update the table key with the new value
		$stmt = $mysqli->prepare("UPDATE members SET inactive = 1 WHERE id = ?");
		$stmt->bind_param("d", $_SESSION['user_id']);
		$stmt->execute();
		
		log_activity('User_Deactivated', $mysqli);  // Log the update
		doLogout($mysqli);
	}
}

function reactivate($mysqli){  // reactivate user account 
	
	if(isUserLoggedIn()){
		
		// update the table key with the new value
		$stmt = $mysqli->prepare("UPDATE members SET inactive = 0 WHERE id = ?");
		$stmt->bind_param("d", $_SESSION['user_id']);
		$stmt->execute();
		
		$_SESSION['inactive'] = 0;
		
		log_activity('User_Reactivated', $mysqli);  // Log the update
	}
}

function send_message($to, $subject, $message, $category, $mysqli){
	
	if($stmt_get = $mysqli->prepare("SELECT id FROM members WHERE username = ? LIMIT 1")){  // get the user's id number from server
		$stmt_get->bind_param('s', $to);  // Bind "$email" to parameter
        $stmt_get->execute();    // Execute the prepared query
        $stmt_get->store_result();
 
        // get variables from result
        $stmt_get->bind_result($to_id);
        $stmt_get->fetch();
    }
    
    if ($stmt_get->num_rows > 0){ // If user exists, insert message
	
		if($stmt = $mysqli->prepare("INSERT INTO messages (from_id, from_username, to_id, subject, message) VALUES (?, ?, ?, ?, ?)")){
			$stmt->bind_param("isiss", $_SESSION['user_id'], $_SESSION['username'], $to_id, $subject, $message);
			$stmt->execute();
			
			return true;  // Message was inserted
		}
	}
	
	else{
		return false;  // User doesn't exist
	}
	
	return false;  // default, message could not be sent
}

// *** NOT CURRENTLY BEING USED ***
function getTable($table_name, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT * FROM {$table_name}")) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($table);
        $stmt->fetch();
        
        return $table;
    }
    else {
	    return null;
    }
}
?>