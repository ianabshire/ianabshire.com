<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
?>
<!DOCTYPE html>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ian Abshire</title>
  	<link rel="stylesheet" href="css/tempPage.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
</head>
    
<body>

  <div class="pagecontainer">
      
    <div id="login-box" class="login-window login">
	<div class="login-text login"><h1>Login</h1>
	<div class="test-user-text login">Test user: admin | Password: admin</div>
	</div>
    <!-- <div class="login-container"> -->
    
    	<!--action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"-->
    	
    	<script>
	        //$('#login-form').validate({errorClass: "error-validation"});		
		</script>
    	
	    <form class="login" id="login-form" action="doLogin.php" method="post">
	    	<div class='field login'><label for='username'>Username:</label></div>
	    	<input class="" type='text' name='username' id='username' size='30' maxlength='30' value='' required/>
	    	
	    	<div class='field login'><label for='password'>Password:</label></div>
	    	<input class="" type='password' name='password' id='password' size='128' maxlength='128' value='' required/>
	    	
	    	<div class="login" id='submit'>
            	<input class="login" type='submit' value='Login'>	
            </div>
            
            <a class="login" id="register" href="register.php" >Register</a>
            <div id="form-error" class="form-error login"></div>
	    </form>
	    
	    <script>
	    	var validator = $( "#login-form" ).validate();
			$( "#username" ).keyup(function() {
				if (!validator.element( "#username" ))
				{
					$("#username").attr('class', 'error-validation');
				}
				else
				{
					$("#username").attr('class', '');
				}
			});
			$( "#password" ).keyup(function() {
				if (!validator.element( "#password" ))
				{
					$("#password").attr('class', 'error-validation');
				}
				else
				{
					$("#password").attr('class', '');
				}
			});
	    </script>
	    
  </div>
      
      
  </div>


    
</body>
</html>