<?php
require "../conexion.php";
require "../classes/cargos.php";
$cargos = new cargos;
session_start();
if(isset($_POST["detalle"],$_POST["tipo"],$_POST["monto"])){	
	$cargos->insertar_cargos($_POST["detalle"],$_POST["tipo"],$_POST["monto"],$conexion);
}


?>