<?php  

 session_start();
 require('connect.php');

if (isset($_POST['usernameCreate']) and isset($_POST['passwordCreate']) and isset($_POST['emailCreate'])) {

    $username = $_POST['usernameCreate'].trim();
    $pass = $_POST['passwordCreate'].trim();
    $pass = md5($pass);
    $email = $_POST['emailCreate'].trim();
    $ime = $_POST['ime'].trim();
    $prezime = $_POST['prezime'].trim();
    
    $query = "SELECT id FROM `korisnik` WHERE user='$username'";
 
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    
    $count = mysqli_num_rows($result);

    if ($count == 0) {
    $sql = "INSERT INTO korisnik (ime, prezime, user, pass, email, aktivan)
        VALUES ('$ime', '$prezime', '$username', '$pass', '$email', '0')";
   
    if ($connection->query($sql)) {
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row["id"];
           
             $mail_content = $ime . ' ' . $prezime . ', hvala na registraciji naloga na sajtu www.gradimobuducnost.rs
        
                Da biste dovrsili kreiranje naloga kliknite na http://gradimobuducnost.rs/gradimobuducnost/user/php/potvrdaNaloga.php?id='.$id;

                $mail_content = stripslashes($mail_content);
                
                mail($email,"Gradimo buducnost", $mail_content);
                echo "Potvrdite kreiranje naloga na email-u: ". $email;
            } else {
                echo 'Greska 40: num_rows = 0';
            }
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
         }
    } else {
       echo "Username zauzet.";
    }

} else {
    echo 'Nisu uneti svi potrebni podaci';
}

session_destroy();
?>