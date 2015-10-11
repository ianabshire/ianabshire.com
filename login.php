<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
?>
<!DOCTYPE html>
<?php
include_once dirname(__FILE__) ."/includes/db_connect.php";
include_once dirname(__FILE__) ."/includes/functions.php";

if (isUserLoggedIn()){
	echo '<script>window.location = "restricted_page";</script>' ;
}

?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ian Abshire - Login</title>
  <link rel="stylesheet" type="text/css" href="css/foundation.css">
  <link rel="stylesheet" type="text/css" href="css/ianabshire.css">
  <link rel="stylesheet" type="text/css" href="css/fonts.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  
  <?php
    include_once "head_include.php";
  ?>

<?php

$username = $password = '';
$error = array();
$submit = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $submit = true;
    
    if(empty($_POST['username'])){
        $error[] = "Username is required.";
    }
    else{
        $username = trim(htmlspecialchars($_POST['username'])); // Storing username
        if(!preg_match("/^[a-zA-Z0-9 ,.'-,.'_]+$/i", $username)){
            $error[] = "Username is invalid.";
        }
    }
    
    if(empty($_POST['password'])){
        $error[] = "Password is required.";
    }
    else{
        $password = htmlspecialchars($_POST['password']); // Storing name
        }
}

?>
  
</head>
    
<body>

<!--
<script> 
  $("#header").load("/header.html"); 
  $("#footer").load("footer.html"); 
</script>
 -->   
  <div class="pagecontainer">
      
    <?php
    include_once "header.php";
    ?>

    <div class="splash-container">
	    
		    
		    <div id="login-box" class="login-window">
		    	<div class="login-text"><h1>Login</h1>
		    	<div class="test-user-text">Test user: admin | Password: admin</div>
		    	</div>
			    <!-- <div class="login-container"> -->
			    
			    	
				    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				    	<div class='field'><label for='username'>Username:</label></div>
				    	<input type='text' name='username' id='username' size='30' maxlength='30' value=''/>
				    	
				    	<div class='field'><label for='password'>Password:</label></div>
				    	<input type='password' name='password' id='password' size='128' maxlength='128' value=''/>
				    	
				    	<div id='submit'>
		                	<input type='submit' value='Login'>	
		                </div>
		                
		                <a id="register" href="register.php" >Register</a>
				    </form>
				    
				    
				    <?php
                    if($submit && empty($error)){
						
						// Check connection
						if ($conn->connect_error) {
						    $error[] = "Error: Could not connect to server.";
						}
						else {
							$success = login($username, $password, $conn);
							if ($success){
								echo '<script>
								window.location = "restricted_page.php";
								</script>' ;
							}
							else{
								$error[] = "The username or password are incorrect.";
							}
						}
                    }
                ?>
				    
				    
			    <div class="form-error">
			    
                <?php 
                    //echo "<script type='text/javascript'>var currentTime = new Date()\n document.write(currentTime)</script>";
                    foreach($error as $err){
                        echo "<div class='error-message'>$err</div>\n";

                    }
                ?>
				</div>
				<!-- </div> -->
		    </div>
		    
	    
    </div>
      
    <?php include_once "footer.php"; ?>
      
  </div>


    
</body>
</html>