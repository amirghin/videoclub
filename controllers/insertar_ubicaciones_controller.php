<?php
require "../conexion.php";
require "../classes/ubicaciones.php";
$ubicaciones = new ubicaciones;

if(isset($_POST["cod_ubicacion"],$_POST["detalle"])){	
	$ubicaciones->insertar_ubicacion($_POST["cod_ubicacion"],$_POST["detalle"],$conexion);
}


?>