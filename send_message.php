<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
?>
<!DOCTYPE html>
<?php
include_once dirname(__FILE__) ."/includes/db_connect.php";
include_once dirname(__FILE__) ."/includes/functions.php";

if (!isUserLoggedIn()){
	echo '<script>window.location = "restricted_page.php";</script>' ;
}
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ian Abshire - Send Message</title>
  <link rel="stylesheet" type="text/css" href="css/foundation.css">
  <link rel="stylesheet" type="text/css" href="css/ianabshire.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/send_message.css">
  
  <?php
    include_once "head_include.php";
  ?>
  
<?php

$to = $subject = $message = $category = '';
$error = array();
$send_address = "ianabshire@nau.edu";
$submit = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $submit = true;

    //$response = trim($_POST['response']); // Storing checkbox
    
    
    
    if(empty($_POST['to'])){
        $error[] = "To field is required.";
    }
    else{
        $to = trim(htmlspecialchars($_POST['to'])); // Storing username
        if(!preg_match("/^[a-zA-Z0-9 ,.'-,.'_]+$/i", $to)){
            $error[] = "Username is invalid.";
        }
    }
    if(empty($_POST['subject'])){
        $error[] = "Subject is required.";
    }
    else{
        $subject = trim($_POST['subject']); // Storing name
        //if(!preg_match("/^[a-z ,.'-]+$/i", $name)){
        //   $error .= "Name is invalid.";
        //}
    }
    
    if(empty($_POST['message'])){
        $error[] = "Message is required.";
    }
    else{
        $message = trim($_POST['message']); // Storing name
        //if(!preg_match("/^[a-z ,.'-]+$/i", $name)){
        //   $error .= "Name is invalid.";
        //}
    }
    
    if(empty($_POST['category'])){
        $category = "";
    }
    else{
        $category = trim($_POST['category']); // Storing name
        //if(!preg_match("/^[a-z ,.'-]+$/i", $name)){
        //   $error .= "Name is invalid.";
        //}
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

    <!--<div class="splash-container">-->
	    
		    
		    <div class="login-window">
		    <div class="send-message-container">
		    	<div class="login-text"><h1>Send Message</h1></div>
			    <!-- <div class="login-container"> -->
				    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				    	<div class='field'><label for='to'>To:</label></div>
				    	<input type='text' name='to' id='to' size='30' maxlength='30' value='<?php echo $to;?>'/>
				    	
				    	<div class='field'><label for='subject'>Subject:</label></div>
				    	<input type='text' name='subject' id='subject' size='90' maxlength='90' value='<?php echo $subject;?>'/>
				    	
				    	<div class='field'><label for='message'>Message:</label></div>
				    	<textarea name='message' id='message' rows='5'><?php echo $message;?></textarea>
				    	
				    	<div class='field'><label for='category'>Category:</label></div>
				    	<div class='select-style'>
					    	<select name='category' id='category'>
	                            <option value=''></option>
	                            <option value='comment'
	                            <?php
	                            if ($category === 'comment')
	                                echo " selected='selected'";
	                            ?>
	                            >Comment</option>
	                            <option value='question'
	                            <?php
	                            if ($category === 'question')
	                                echo " selected='selected'";
	                            ?>
	                            >Question</option>
	                            <option value='problem'
	                            <?php
	                            if ($category === 'problem')
	                                echo " selected='selected'";
	                            ?>
	                            >Problem</option>
	                        </select>
                        </div>
				    	
				    	<div id='submit'>
		                	<input type='submit' value='Send Message'>	
		                </div>
		                
		                <a id="register" href="restricted_page.php">Cancel</a>
				    </form>
				    
				    
				    <?php
                    if($submit && empty($error)){

						// Check connection
						if ($conn->connect_error) {
						    $error[] = "Error: Could not connect to server.";
						}
						else {
							date_default_timezone_set('America/Phoenix');
		                    $date = date('m/d/Y h:i:s a', time());
		                    
							if (!empty($category)){	
		                        $message = nl2br("Sent: ".$date."\n\nCategory: ".strtoupper($category)."\n\nMessage:\n".$message);
							}
							else{
								$message = nl2br("Sent: ".$date."\n\nMessage:\n".$message);
							}
							
							$success = send_message($to, $subject, $message, $category, $conn);
							if ($success){
								//login($username, $password, $conn);
								echo '<script>
								window.location = "restricted_page.php";
								</script>' ;
							}
							else{
								$error[] = "The user you are trying to message does not exist.";
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
		    
	    
    <!--</div>-->
    
     <?php include_once "footer.php"; ?>
      
  </div>


    
</body>
</html>