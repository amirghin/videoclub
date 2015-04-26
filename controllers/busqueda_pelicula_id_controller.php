<?php
require "../conexion.php";
require "../classes/peliculas.php";
$peliculas = new peliculas;

if(isset($_POST["id_pelicula"])){		
		$peliculas->buscar_pelicula($_POST["id_pelicula"], $conexion);	
}

?>