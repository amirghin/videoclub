<?php
require "../conexion.php";
require "../classes/peliculas.php";
$peliculas = new peliculas;
session_start();

if(isset($_POST["id_pelicula"])){		
		$peliculas->eliminar_peliculas($_POST["id_pelicula"], $conexion);	
}

?>