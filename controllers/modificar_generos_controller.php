<?php
require "../conexion.php";
require "../classes/generos.php";
$generos = new generos;

$generos->modificar_genero($_POST["id_genero"],$_POST["nombre"],$conexion);


?>