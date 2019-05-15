<?php
$connection = mysqli_connect('localhost', 'gradimob_sena', 'gradimobuducnost');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'gradimob_sena');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

?>