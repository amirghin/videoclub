<?php

require "../conexion.php";
require "../classes/devoluciones.php";
require "../classes/cargos_devolucion.php";
session_start();
$devolucion = new devoluciones;
$cargos_devolucion = new cargos_devolucion;

if(isset($_POST["id_reservacion"], $_POST["observaciones"], $_POST["cargos"], $_SESSION["id_usuario"])){		
		$devolucion->insertar_devolucion($_POST["id_reservacion"], $_POST["observaciones"],$conexion, $_SESSION["id_usuario"]);	
		$cargos_devolucion->insertar_cargos_devolucion($devolucion->id_devolucion, $_POST["cargos"], $conexion, $_SESSION["id_usuario"]);
		//echo $devolucion->id_devolucion;
}

?>