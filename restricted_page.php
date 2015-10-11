<!-- Restriced page that is accessed when user logs in successfully -->

<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
?>
<!DOCTYPE html>
<?php
include_once dirname(__FILE__) ."/includes/db_connect.php";
include_once dirname(__FILE__) ."/includes/functions.php";
if (isset($_GET['logout']) && $_GET['logout'] == true)  // if page is retrieved with logout var set, logout
	doLogout($conn);
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ian Abshire - Form</title>
  <link rel="stylesheet" type="text/css" href="css/foundation.css">
  <link rel="stylesheet" type="text/css" href="css/ianabshire.css">
  <link rel="stylesheet" type="text/css" href="css/restricted.css">
  <link rel="stylesheet" type="text/css" href="css/fonts.css">
  
  <?php
    include_once "head_include.php";
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
    
    <script>
    	$( "login-hyperlink" ).click(function() {
    		$( "login-link" ).click();
    	});
    </script>
    
    <div class="container">
      <div class="restricted-content">
		<?php
		if (isset($_GET['logout']) && $_GET['logout'] == true){  // Display if user logged out
			echo "You have been logged out! <br>";
		}
		if (isset($_GET['updated']) && $_GET['updated'] == true){  // Display if user updated info
			echo "Your information has been updated! <br>";
		}
		if (isset($_GET['deactivate']) && $_GET['deactivate'] == true){  // Display if user has deactivated their account
			deactivate($conn);
			echo "Your account has been deactivated. <br>";
		}
		if (isset($_GET['reactivate']) && $_GET['reactivate'] == true){  // Display if user has reactivated their account
			reactivate($conn);
			echo "Your account has been reactivated! <br>";
		}

		if (isUserLoggedIn()){  // Check if user is logged in
			if (!$_SESSION['inactive'] == 1){
				include_once "logged_in_content.php";  // Insert member content
				if ($_SESSION['admin_status'] == 1){  // If member is admin, display Admin Page button
					echo "<a class='button' id='admin-button' href='admin_page.php'>Admin Page</a>";
				}
			}
			else{
				echo " This account is currently inactive. <a href='?reactivate=true'>Click here to reactivate</a>.<br>";
			}
			
			
			echo "<a class='button' id='logout-button' href='restricted_page.php?logout=true'>Logout</a>";  // Display logout button
		}
		else{
			echo "This is a restricted page. Please <a id='login-hyperlink' href='#login-box'>login</a> to view.";  // If not logged in, display message
		}
		
		?>
		
		<script>$("#login-hyperlink").leanModal();</script>
      </div>
    </div>
    
    <?php include_once "footer.php"; ?>
          
  </div>

</html>