<?php  

 session_start();
 require('connect.php');

if(isset($_SESSION['user'])) {
    echo "Ulogovani ste";
    exit;
}

if (isset($_POST['username']) and isset($_POST['pass'])) {

    $username = $_POST['username'].trim();
    $pass = $_POST['pass'].trim();
    $pass = md5($pass);

    $query = "SELECT * FROM `korisnik` WHERE user='$username' and pass='$pass' and aktivan = 1";
 
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['user'] = $username;
    } 
}

if (isset($_SESSION['user'])) {
     header("Location: http://gradimobuducnost.rs/gradimobuducnost/user/php/korisnik/index.php");
} else {
    echo "Pogrešni kredencijali";
}

?>