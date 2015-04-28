<?php
require "../conexion.php";
require "../classes/peliculas.php";
$peliculas = new peliculas;

session_start();

if(isset($_POST["nombre_pelicula"])){		
		$peliculas->buscar_pelicula_nombre($_POST["nombre_pelicula"], $conexion);	
}

?>