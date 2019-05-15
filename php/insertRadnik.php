<?php
$servername = "localhost";
$username = "gradimob_sena";
$password = "gradimobuducnost";
$dbname = "gradimob_sena";


$user = $_POST["user"];
$zanimanje = $_POST["zanimanje"];
$email = $_POST["email"];
$telefon = $_POST["telefon"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO radnik (ime, telefon, zanimanje, email) VALUES ( '$user', '$telefon', '$zanimanje', '$email');";


if ($conn->query($sql) === TRUE) {
   // echo "successfully";
} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>