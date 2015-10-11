<?php
include_once dirname(__FILE__) ."/includes/db_connect.php";
include_once dirname(__FILE__) ."/includes/functions.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$success = login("test_user", "test", $conn);

echo $success;

$result = $conn->query("SELECT * FROM log");

$filename = "log_archive_".date("Y-m-d_H-i",time());
$fp = fopen($filename, 'w');

// and loop through the actual data
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
fclose($fp);

/*
$values = $conn->mysqli_query("SELECT * FROM log");
while ($rowr = mysql_fetch_row($values)) {
 for ($j=0;$j<$i;$j++) {
  $csv_output .= $rowr[$j].", ";
 }
 $csv_output .= "\n";
}
 
$filename = "Archive_".date("Y-m-d_H-i",time());
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header("Content-disposition: filename=".$filename.".csv");
print $csv_output;
*/
/*
if ($result = $conn->query("SELECT * FROM log")) {

    // Note, that we can't execute any functions which interact with the
    //   server until result set was closed. All calls will return an
    //   'out of sync' error
    if (!$conn->query("SET @a:='this will not work'")) {
        printf("Error: %s\n", $conn->error);
    }
    
    //$resultArray = $result->fetch_all(MYSQLI_ASSOC);
    
    echo "<table border='1' style='border-collapse: collapse;'>";
    while($row = $result->fetch_assoc())
	{
		echo "<tr>";
	    // $row is array... foreach( .. ) puts every element
	    // of $row to $cell variable
	    foreach($row as $cell)
	        echo "<td>$cell</td>";
	
	    echo "</tr>";
	}
    echo "</table>";
    $result->close();
}
*/
//if (success)
?> 

