<!-- Content to be inserted on restricted page if user is logged in -->

<br>
<?php
if (!isUserLoggedIn()){
	echo '<script>window.location = "restricted_page.php";</script>' ;
}

$session_keys = array();
foreach ($_SESSION as $key=>$val)
    $session_keys[] = $key;
?>
<div class="user-info">
	<h2>User Info</h2>
	<b>Username:</b> <?php if(array_search('username', $session_keys)){ echo $_SESSION['username'];}?>
	<br>
	<b>Email:</b> <?php if(array_search('email', $session_keys)){ echo $_SESSION['email'];}?>
	<br>
	<b>Password:</b> <?php if(array_search('password', $session_keys)){ echo $_SESSION['password'];}?>
	<br>
</div>

<div class="update-info-link">
<a href='change_info.php'>Update Information</a>
<br><br>
<a href='?deactivate=true'>Deactivate Account</a>
</div>

<div class="message-section">

	<h2>Messages</h2>
	<?php
	echo "<a class='button' id='send-button' href='send_message.php'>Send Message</a>";  // Display logout button
	
	$url = $_SERVER['REQUEST_URI'];
	if (strpos($url,'?') !== false){  // check if display log was previously clicked, if true,
		$url = strtok($url, '?');		   // clear get vars and add display_log (keeps it from continually
		//$url = $url . "?message_id=".$_GET['message_id']; // adding to url)
	}
	
	if($result = $conn->query("SELECT message_id, from_id, from_username, subject, message  
		FROM messages 
		WHERE to_id = (" . $_SESSION['user_id'] . ") AND  unread = '0' AND deleted = '1'")){
		
		if(mysqli_num_rows($result) > 0){
			echo "<h3>Unread</h3>";
			echo "<div id='from-header'><b>From</b></div><div id='subject-header'><b>Subject</b></div>";
			
			while($row = $result->fetch_assoc()){
			    echo "<div class='message-list'>";
			    echo "<div id='from'>" . $row['from_username'] . "</div> <a id='subject' href='".$url."?message_id=".$row['message_id'].
			    		"' >".$row['subject']."</a></div>";
			    
			    if(isset($_GET['message_id']) && $_GET['message_id'] == $row['message_id']){
			    	echo "<div class='message'>".$row['message']."</div>";
				    echo "<a id='delete-button' href='".$url."?delete_id=".$_GET['message_id']."'>Delete</a>";
				}
			    if(isset($_GET['delete_id']) && $_GET['delete_id'] == $row['message_id']){
				    $conn->query("UPDATE messages SET deleted = 0 WHERE message_id = ".$_GET['delete_id']);
				    echo '<script>window.location = "restricted_page.php";</script>' ;
			    }
			}
		}
	}
	if($result = $conn->query("SELECT message_id, from_id, from_username, subject, message  
		FROM messages 
		WHERE to_id = (" . $_SESSION['user_id'] . ") AND  unread = '1' AND deleted = '1'")){
		
		if(mysqli_num_rows($result) > 0){
			echo "<h3>Read</h3>";
			echo "<div id='from-header'><b>From</b></div><div id='subject-header'><b>Subject</b></div>";
			
			while($row = $result->fetch_assoc()){
			    echo "<div class='message-list'>";
			    echo "<div id='from'>" . $row['from_username'] . "</div> <a id='subject' href='".$url."?message_id=".$row['message_id'].
			    		"' >".$row['subject']."</a></div>";
			    		
			    if(isset($_GET['message_id']) && $_GET['message_id'] == $row['message_id']){
			    	echo "<div class='message'>".$row['message']."</div>";
			    	echo "<a id='delete-button' href='".$url."?delete_id=".$_GET['message_id']."'>Delete</a>";
			    	echo "<a id='delete-button' href='".$url."?unread_id=".$_GET['message_id']."'>Mark Unread</a>";
			    }
			    if(isset($_GET['delete_id']) && $_GET['delete_id'] == $row['message_id']){
				    $conn->query("UPDATE messages SET deleted = 0 WHERE message_id = ".$_GET['delete_id']);
				    echo '<script>window.location = "restricted_page.php";</script>' ;
			    }
			    if(isset($_GET['unread_id']) && $_GET['unread_id'] == $row['message_id']){
				    $conn->query("UPDATE messages SET unread = 0 WHERE message_id = ".$_GET['unread_id']);
				    echo '<script>window.location = "restricted_page.php";</script>' ;
			    }
			}
		}
		
		if(isset($_GET['message_id'])){
	    	$conn->query("UPDATE messages SET unread = 1 WHERE message_id = ".$_GET['message_id']);
	    }
	}
	?>

</div>

