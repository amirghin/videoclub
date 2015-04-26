<?php
require "../conexion.php";
require "../classes/generos.php";
$generos = new generos;

$generos->llenar_dropdown($conexion);


?>