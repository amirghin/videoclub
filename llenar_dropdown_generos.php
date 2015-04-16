<?php
	include_once("generos.php");
	//$partidos = new Partidos;
	try{
		$generos = new generos;
		$resultado_llenar = $generos->llenar_select($conexion);
	}catch (Exception $e){
		$mensaje = $e->GetMessage();
	}
?>