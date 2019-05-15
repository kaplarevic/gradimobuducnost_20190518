<?php
	$servername = "localhost";
	$username = "gradimob_sena";
	$password = "gradimobuducnost";
	//$username = "root";
	//$password = "";
	$dbname = "gradimob_sena";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$sql = "select * from zanimanje;";
	$result = $conn->query($sql);
    
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
      echo $row["key_zanimanje"] . "#".$row["naziv"]. "@";
    }
    
} else {
    echo "0 results";
}
$conn->close();
?>