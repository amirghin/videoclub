<?php
$servername = "localhost";
$username = "root";
$db = "videoclub";
$password = "1234";

$conexion = mysqli_connect($servername, $username, $password, $db);

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>