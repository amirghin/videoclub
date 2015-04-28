<?php
require "../conexion.php";
require "../classes/generos.php";
$generos = new generos;

session_start();

$generos->eliminar_genero($_POST["id_genero"],$conexion);


?>