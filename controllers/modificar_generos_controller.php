<?php
require "../conexion.php";
require "../classes/generos.php";
$generos = new generos;
session_start();
if(isset($_POST["id_genero"],$_POST["nombre"], $_SESSION["id_usuario"])){
	$generos->modificar_genero($_POST["id_genero"],$_POST["nombre"],$conexion, $_SESSION["id_usuario"]);
}

?>