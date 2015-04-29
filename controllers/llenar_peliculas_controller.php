<?php
require "../conexion.php";
require "../classes/peliculas.php";
$peliculas = new peliculas;
session_start();
$peliculas->llenar_dropdown_peliculas($conexion);


?>