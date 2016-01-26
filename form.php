<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
?>
<!DOCTYPE html>
<?php
include_once dirname(__FILE__) ."/includes/db_connect.php";
include_once dirname(__FILE__) ."/includes/functions.php";
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ian Abshire - Contact</title>
  <link rel="stylesheet" type="text/css" href="css/foundation.css">
  <link rel="stylesheet" type="text/css" href="css/ianabshire.css">
  <link rel="stylesheet" type="text/css" href="css/form.css">
  
  <?php
    include_once "head_include.php";
  ?>
    
<?php
    /* Email Form
    * This is a simple email form that is used to demonstrate PHP validation. This
    * particular file also demonstrates using PHP to display HTML elements
    */
    
$submit = false;
$error = array();

$name = $email = $subject = $message = $category = $response = '';
$send_address = "ian@ianabshire.com";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $submit = true;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $category = $_POST['category'];
    
    if(!empty($_POST['response'])){
        $response = trim($_POST['response']);
    }
}

    //$response = trim($_POST['response']); // Storing checkbox
    
    
/*    
    if(empty($_POST['name'])){
        $error[] = "Name is required.";
    }
    else{
        $name = trim(htmlspecialchars($_POST['name'])); // Storing name
        if(!preg_match("/^[a-z ,.'-]+$/i", $name)){
            $error[] = "Name is invalid.";
        }
    }
    
    if(empty($_POST['email'])){
        $error[] = "Email is required.";
    }
    else{
        $email = trim($_POST['email']); // Storing name
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $error[] = "Email is invalid.";
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
        $error[] = "Category is required.";
    }
    else{
        $category = trim($_POST['category']); // Storing name
        //if(!preg_match("/^[a-z ,.'-]+$/i", $name)){
        //   $error .= "Name is invalid.";
        //}
    }
    
    if(!empty($_POST['response'])){
        $response = trim($_POST['response']);
    }
    
}


    
    $labels = array("name" => "Name:", "email" => "Email:", "subject" => "Subject:", 
                    "message" => "Message:", "category" => "Category:");
                    
*/
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
    
      <div class="container">
          <div class="email-form">
          	<div class="contact-text">
            	<h3>Contact</h3>
				This is a simple contact form utilizing JavaScript and PHP for form validation. Feel free to send me a message!
          	</div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" name="email_form"
            	onsubmit="return validateFormOnSubmit(this)">
            	
		    	<div class='field'><label for='name'>Name:</label></div>
		    	<input type='text' class='input' name='name' id='name' size='30' maxlength='30' value=''/>
		    	
		    	<div class='field'><label for='email'>Email:</label></div>
		    	<input type='text' class='input' name='email' id='email' size='90' maxlength='90' value=''/>
		    	
		    	<div class='field'><label for='subject'>Subject:</label></div>
		    	<input type='text' class='input' name='subject' id='subject' size='90' maxlength='90' value=''/>
		    	
		    	<div class='field'><label for='message'>Message:</label></div>
		    	<textarea class='input' name='message' id='message' rows='5'></textarea>
		    	
		    	<div class='field'><label for='category'>Category:</label></div>
		    	<div class='select-style'>
			    	<select name='category' id='category'>
                        <option value=''></option>
                        <option value='comment'>Comment</option>
                        <option value='question'>Question</option>
                        <option value='problem'>Problem</option>
                    </select>
                </div>
		    	
		    	<div id='submit'>
                	<input class='button' type='submit' value='Send Message'>	
                </div>
		    </form>
                
            <div class='message-sent' id='message-sent'>
                
                <?php
                    if($submit){
                        
                        date_default_timezone_set('America/Phoenix');
                        $date = date('m/d/Y h:i:s a', time());
                        $body = "Sent: ".$date."\n\nCategory: ".strtoupper($category)."\n\nMessage:\n".$message;
                        
                        
                        $sent = mail($send_address, strtoupper($category).": ".$subject, wordwrap($body, 70, "\r\n"), "From: ".$email."\r\nCc: ".$email);
                        
                        if($sent){
                            echo "Your message has been sent!";
                            if(isset($response) && $response=='yes'){
                                $resp_sent = mail($email, "Thank you for your message!", wordwrap("Thank you for contacting me. I will get to your message as soon as I can!\n\n-Ian Abshire", 70, "\r\n"), "From: ".$send_address);
                            }
                        }
                        else{
                            echo "Your message could not be sent.";
                        }
                        
						$submit = false;
                    }
                    
                ?>
              </div>
              
                <div class="form-error" id="form-error">
                    <?php 
                    /*
                        //echo "<script type='text/javascript'>var currentTime = new Date()\n document.write(currentTime)</script>";
                        foreach($error as $err){
                            echo "<div class='error-message'>$err</div>\n";

                        }
                    */
                    ?>
                </div>
            </div>
        </div>
        
        <?php include_once "footer.php"; ?>
        
    </div>
</body>
</html>