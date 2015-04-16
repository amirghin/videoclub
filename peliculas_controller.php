<?php

$mensaje = "";
$id_pelicula = "";
$nombre_pelicula = "";
$precio_alquiler = "";
$genero = "";
$duracion = "";
$ruta_imagenes = "";

require_once "conexion.php";
require_once "peliculas.php";

if ((isset($_POST['ruta_imagenes']))){
	include_once "ftpupload.php";
}


if(isset($_POST["id_pelicula"], $_POST["nombre_pelicula"], $_POST["precio_alquiler"], $_POST["genero"],  $_POST["duracion"])){
	try{
		$peliculas = new peliculas;
		$id_pelicula = $_POST["id_pelicula"];
		$nombre_pelicula = $_POST["nombre_pelicula"];
		$precio_alquiler = $_POST["precio_alquiler"];
		$genero = $_POST["genero"];
		$ruta_imagenes = ($_FILES["ruta_imagenes"]["name"]);
		$duracion = $_POST["duracion"];
		$peliculas->insertar_peliculas($id_pelicula,$nombre_pelicula,$precio_alquiler,$genero,$ruta_imagenes,$duracion,$conexion);	
	}catch (Exception $e){
			//$mensaje = $e->GetMessage();
		   echo json_encode(array(
		        'error' => array(
		            'code' => $e->getCode(),
		            'message' => $e->getMessage()
		        )
		    ));


	}

}

?>