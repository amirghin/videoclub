<?php

require "../conexion.php";
require "../classes/devoluciones.php";
require "../classes/cargos_devolucion.php";

$devolucion = new devoluciones;
$cargos_devolucion = new cargos_devolucion;

if(isset($_POST["id_reservacion"], $_POST["observaciones"], $_POST["cargos"])){		
		$devolucion->insertar_devolucion($_POST["id_reservacion"], $_POST["observaciones"],$conexion);	
		$cargos_devolucion->insertar_cargos_devolucion($devolucion->id_devolucion, $_POST["cargos"], $conexion);
		//echo $devolucion->id_devolucion;
}

?>