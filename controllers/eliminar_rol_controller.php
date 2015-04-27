<?php
require "../conexion.php";
require "../classes/roles.php";
$rol = new roles;

if(isset($_POST["id_rol"])){		
		$rol->eliminar_roles($_POST["id_rol"], $conexion);	
}
?>