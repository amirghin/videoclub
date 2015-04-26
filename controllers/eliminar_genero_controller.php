<?php
require "../conexion.php";
require "../classes/generos.php";
$generos = new generos;

$generos->eliminar_genero($_POST["id_genero"],$conexion);


?>