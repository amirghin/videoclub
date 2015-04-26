<?php

require "../conexion.php";
require "../classes/peliculas.php";
$peliculas = new peliculas;

if(isset($_POST["nombre_pelicula"], $_POST["precio_alquiler"], $_POST["genero"], $_POST["duracion"])){		
		$peliculas->insertar_peliculas($_POST["nombre_pelicula"], $_POST["precio_alquiler"], $_POST["genero"], $_POST["duracion"], $conexion);	
}

?>