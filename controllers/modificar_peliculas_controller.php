<?php

require "../conexion.php";
require "../classes/peliculas.php";
$peliculas = new peliculas;

session_start();

if(isset($_POST["id_pelicula"], $_POST["nombre_pelicula"], $_POST["precio_alquiler"], $_POST["genero"], $_POST["ruta_imagenes"], 
		$_POST["duracion"])){	
		$peliculas->modificar_peliculas($_POST["id_pelicula"], $_POST["nombre_pelicula"], $_POST["precio_alquiler"], $_POST["genero"], 
										$_POST["ruta_imagenes"], $_POST["duracion"], $conexion);	
}

?>