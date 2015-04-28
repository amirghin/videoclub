<?php
require "../conexion.php";
require "../classes/generos.php";
$generos = new generos;
session_start();
$generos->llenar_dropdown($conexion);


?>