<?php

require "../conexion.php";
require "../classes/peliculas.php";
$peliculas = new peliculas;
session_start();
if(isset($_POST["nombre_pelicula"], $_POST["precio_alquiler"], $_POST["genero"], $_POST["duracion"], $_SESSION["id_usuario"])){		
		$peliculas->insertar_peliculas($_POST["nombre_pelicula"], $_POST["precio_alquiler"], $_POST["genero"], $_POST["duracion"], $conexion, $_SESSION["id_usuario"]);	
}

?>