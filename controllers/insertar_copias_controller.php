<?php
require "../conexion.php";
require "../classes/copias.php";
$copias = new copias;
session_start();
if(isset($_POST["id_pelicula"],$_POST["disponibilidad"], $_POST["ubicaciones_cod_ubicacion"], $_SESSION["id_usuario"])){	
	$copias->insertar_copia($_POST["id_pelicula"],$_POST["disponibilidad"],$_POST["ubicaciones_cod_ubicacion"],$conexion), $_SESSION["id_usuario"]);
}


?>