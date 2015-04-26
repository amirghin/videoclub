<?php
$servername = "localhost";
$username = "sys_videoclub";
$db = "videoclub";
$password = "v1d30c!ub$";

$conexion = mysqli_connect($servername, $username, $password, $db);

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>