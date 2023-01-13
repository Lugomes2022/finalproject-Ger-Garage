<?php

$hostname = "localhost";
$user ="root";
$password = "";
$database = "gergarage";

$conection = mysqli_connect($hostname,$user,$password,$database);

if ($conection->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

