<?php
require "../conexion.php";
require "../classes/peliculas.php";
$peliculas = new peliculas;

if(isset($_POST["genero_pelicula"])){		
		$peliculas->buscar_pelicula_genero($_POST["genero_pelicula"], $conexion);	
}

?>