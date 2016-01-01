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
  <title>Ian Abshire - Form</title>
  <link rel="stylesheet" type="text/css" href="css/foundation.css">
  <link rel="stylesheet" type="text/css" href="css/ianabshire.css">
  <link rel="stylesheet" type="text/css" href="css/restricted.css">
  <link rel="stylesheet" type="text/css" href="css/admin.css">
  
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
      
    <?php include_once "header.php"; ?>
    
    <div class="container">
      <div class="restricted-content">
      
		<?php
		
		if (isUserLoggedIn()){  // Check if user is logged in
		
			if ($_SESSION['admin_status'] == 1){  // Check if user is an admin
			
				echo "<h2>Admin Page</h2>";
				
				$url = $_SERVER['REQUEST_URI'];
			
				if (isset($_GET['archive_log']) && $_GET['archive_log'] == true){  // If archive_log is true, archive the log
					
					$result = $conn->query("SELECT * FROM log"); // select entire log table

					//localhost archive location
					//$filename = "../ianabshire/log_archives/log_archive_".date("Y-m-d_H-i",time());
					//CEFNS server archive location
					$filename = dirname(__FILE__) . "/log_archives/log_archive_".date("Y-m-d_H-i",time());  // create file name
					//echo $filename . "<br>"; // display file name (for testing)
					$fp = fopen($filename, 'w') or die("can't open file");  // open file for writing
					
					// loop through the actual data, adding it to the .csv
					while($row = $result->fetch_assoc()) {
					   
					    $line = "";
					    $comma = "";
					    foreach($row as $value) {
					        $line .= $comma . '"' . str_replace('"', '""', $value) . '"';
					        $comma = ",";
					    }
					    $line .= "\n";
					    fputs($fp, $line);
					   
					}
					fclose($fp);  // close file when done
					echo "Archive saved to: ".$filename;
					$conn->query("DELETE FROM log");  // clear log table
				}
				
				if (isset($_GET['display_log']) && $_GET['display_log'] == true){  // If display_log is true, display the log
				
					echo "<table>";  // create table with headers
					echo "<tr>
						    <th>Date-Time</th>
						    <th>Activity</th>		
						    <th>User Id</th>
						    <th>Username</th>
						 </tr>";
					
					if ($result = $conn->query("SELECT * FROM log")) {  // select entire log table
	
					    /* Note, that we can't execute any functions which interact with the
					       server until result set was closed. All calls will return an
					       'out of sync' error */
					    if (!$conn->query("SET @a:='this will not work'")) {
					        printf("Error: %s\n", $conn->error);
					    }
					   
					    while($row = $result->fetch_assoc())  // loop through each row
						{
							echo "<tr>";
						    // $row is array... foreach( .. ) puts every element
						    // of $row to $cell variable
						    foreach($row as $cell)
						        echo "<td>$cell</td>"; // add each cell to table
						
						    echo "</tr>";
						}
					    echo "</table>";
					    $result->close();
					}
					$conn->close();
				}
					
					if (strpos($url,'display_log') !== false)  // check if display log was previously clicked, if true,
							$url = strtok($url, '?');		   // clear get vars and add display_log (keeps it from continually
							$url = $url . "?display_log=true"; // adding to url)
			
				
				// Display log button
				echo "<a class='button' id='admin-button' href='";
					if (strpos($url, '?') !== false)
					{
					  $url = $url . '&display_log=true';  //If GET variables in url, append with &
					  echo $url;
					}
					else
					{
					  $url = $url . '?display_log=true'; //If NO GET variables in url, append with ?
					  echo $url;
					}
				echo "'>Display Log</a>";
				// display archive button
				echo "<a class='button' id='admin-button' href='";
					if (strpos($url, '?') !== false)
					{
					  $url = $url . '&archive_log=true';  //If GET variables in url, append with &
					  echo $url;
					}
					else
					{
					  $url = $_url . '?archive_log=true';  //If NO GET variables in url, append with ?
					  echo $url;
					}
				echo "'>Archive Log</a>";
				
			}
			else {
				echo "This is an admin only page. You do not have access.";
			}
			
		}
		else{
			echo "This is a restricted page. Please <a href='login.php?redirect=admin_page.php'>login</a> to view.";
		}
		
		?>
      </div>
    </div>
    
    <?php include_once "footer.php"; ?>
          
  </div>

</html>