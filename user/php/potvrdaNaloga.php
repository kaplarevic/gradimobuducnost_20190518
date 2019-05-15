<?php  

 session_start();
 require('connect.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'].trim();
    $query = "SELECT * FROM `korisnik` WHERE id='$id' and aktivan = 0";
 
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $sql = "UPDATE korisnik SET aktivan='1' WHERE id=" . $id;

        if ($connection->query($sql)) {
            //echo "Nalog uspesno kreiran";
            header("Location: http://gradimobuducnost.rs/gradimobuducnost/user/index.html");
            exit;
        } else {
            echo "Error updating record: " . $connection->error;
        }
    } else {
        echo "Error 20: user count > 1";
    }
} else {
    echo "Error 10: Neispravan id";
}

session_destroy();
?>