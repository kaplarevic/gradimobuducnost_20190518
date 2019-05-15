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
	$sql = "SELECT p.key_prijava, p.ime,  p.prezime, p.godina_rodjenja, ss.naziv as strucna_sprema, z1.naziv as osnovno_zanimanje, z2.naziv as sekundarno_zanimanje, p.kontakt_telefon, s.naziv as status ,p.komentar  
		from prijava p
		join strucna_sprema ss on (p.strucna_sprema = ss.key_strucna_sprema)
		join zanimanje z1 on (p.osnovno_zanimanje = z1.key_zanimanje)
		join status s on (p.status = s.key_status)
		left join zanimanje z2 on (p.sekundarno_zanimanje = z2.key_zanimanje)";
	$result = $conn->query($sql);
    
	if ($result->num_rows > 0) {
	// output data of each row
	echo " <table id='tableAdmin' class='display'>";
	echo " <thead><th>key_prijava</th><th>ime</th><th>prezime</th><th>godina_rodjenja</th><th>Strucna sprema</th><th>Osnovno zanimanje</th><th>Sekundarno zanimanje</th><th>Kontakt telefon</th><th>Status</th><th>Komentar</th></thead>";
	

	while($rows = $result->fetch_assoc()) {
	//echo " <thead><tr> ";
    // foreach ($rows as $key => $value) {
    // 	echo "<th>".$key ."</th>";
    //}
    //echo "</tr></thead>";
    echo " <tbody> <tr>";
     foreach ($rows as $key => $value) {
     	echo "<td>".$value."</td>";
     }
     echo "</tr></tbody>";
   }
   echo("</table>");
    
} else {
    echo "0 results";
}
$conn->close();
?>