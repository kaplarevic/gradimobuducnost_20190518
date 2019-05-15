<?php  

session_start();
//require('connect.php');

if(!isset($_SESSION['user'])) {
    header("Location: http://gradimobuducnost.rs/gradimobuducnost/user/index.html");
    exit;
}

echo 'Dobrodosli';

?>