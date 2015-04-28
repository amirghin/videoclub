<?php
require "../conexion.php";
require "../classes/ubicaciones.php";
$ubicaciones = new ubicaciones;
session_start();
if(isset($_POST["cod_ubicacion"],$_POST["detalle"], $_SESSION["id_usuario"])){	
	$ubicaciones->insertar_ubicacion($_POST["cod_ubicacion"],$_POST["detalle"],$conexion, $_SESSION["id_usuario"]);
}


?>