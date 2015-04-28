<?php
require "../conexion.php";
require "../classes/generos.php";
$generos = new generos;
session_start();
$generos->modificar_genero($_POST["id_genero"],$_POST["nombre"],$conexion);


?>