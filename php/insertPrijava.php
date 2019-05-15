<?php
$servername = "localhost";
$username = "gradimob_sena";
$password = "gradimobuducnost";
//$username = "root";
//$password = "";
$dbname = "gradimob_sena";


$ime = $_POST["ime"];
$prezime = $_POST["prezime"];
$godinaRodjenja = $_POST["godinaRodjenja"];
$strucnaSprema = $_POST["strucnaSprema"];
$osnovnoZanimanje = $_POST["osnovnoZanimanje"];
$sekundarnoZanimanje = $_POST["sekundarnoZanimanje"];
$kontaktTel = $_POST["kontaktTel"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$rezultat = "";

if(isset($ime) && isset($prezime) && isset($godinaRodjenja) && (isset($strucnaSprema) && $strucnaSprema != '-1') && (isset($osnovnoZanimanje) && $osnovnoZanimanje != '-1') && isset($kontaktTel)) 
{
	if($sekundarnoZanimanje == -1){
		$sekundarnoZanimanje = null;

		$sql = "INSERT INTO prijava (ime, prezime, godina_rodjenja, strucna_sprema, osnovno_zanimanje, sekundarno_zanimanje , kontakt_telefon) VALUES ( '$ime', '$prezime', '$godinaRodjenja', $strucnaSprema, $osnovnoZanimanje, NULL, '$kontaktTel');";
	}
	else{
		$sql = "INSERT INTO prijava (ime, prezime, godina_rodjenja, strucna_sprema, osnovno_zanimanje, sekundarno_zanimanje , kontakt_telefon) VALUES ( '$ime', '$prezime', '$godinaRodjenja', $strucnaSprema, $osnovnoZanimanje, $sekundarnoZanimanje, '$kontaktTel');";	
	}
	
	if ($conn->query($sql) === TRUE) {	
    	echo "Uspešno čuvanje prijave.";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
    	
	}
} else{
 echo "Lose prosledjeni parametri: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>