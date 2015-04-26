<?php

require "../conexion.php";
require "../classes/peliculas.php";
$peliculas = new peliculas;

if(isset($_POST["id_pelicula"], $_POST["nombre_pelicula"], $_POST["precio_alquiler"], $_POST["genero"], $_POST["ruta_imagenes"], 
		$_POST["duracion"])){		
		$peliculas->insertar_peliculas($_POST["id_pelicula"], $_POST["nombre_pelicula"], $_POST["precio_alquiler"], $_POST["genero"], 
										$_POST["ruta_imagenes"], $_POST["duracion"], $conexion);	
}elseif(isset($_POST["id_pelicula"])){
	$peliculas->buscar_pelicula($_POST["id_pelicula"], $conexion);
}

?>