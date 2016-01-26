	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	
	<!-- jQuery/JavaScript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic' rel='stylesheet' type='text/css'>
	
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
	<!--<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">-->
	<link rel="icon" type="image/png" href="/favicon.png" sizes="32x32">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	
<?php

/*
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
*/
?>
<!--
<script> 
    // wait for the DOM to be loaded 
    $(document).ready(function() { 
    	var options = { 
        //target:        '#output1',   // target element(s) to be updated with server response 
        //beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
        } 
        
        $('#login-form').ajaxForm(options); 
    });
    
    function showResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
 
    alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
        '\n\nThe output div should have already been updated with the responseText.'); 
}
</script> 

-->

<!--
<script>
function onClickLogin() {
	var username = document.getElementById("username");
	var password = document.getElementById("password");
	var error = [];
    if (username.length == 0) {
    	error[error.length] = "Please enter a username.";  
    }
    if (password.length == 0) {
    	error[error.length] = "Please enter a password.";       
    }
    if (error.length == 0) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "true"){
	                window.location = "restricted_page.php";
                }
                else {
	                document.getElementByClass("form-error").innerHTML = "<div class='error-message login'>$err</div>";
                }
            }
        }
        xmlhttp.open("POST", dirname(__FILE__) ."/includes/doLogin.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("username="+username+"&password="+password);
    }
}
</script>

-->