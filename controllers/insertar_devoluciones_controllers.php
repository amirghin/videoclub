<?php

require "../conexion.php";
require "../classes/devoluciones.php";

$devolucion = new devoluciones;

if(isset($_POST["id_reservacion"], $_POST["observaciones"])){		
		$devolucion->insertar_devolucion($_POST["id_reservacion"], $_POST["observaciones"],$conexion);	
}

?>