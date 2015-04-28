<?php
require "../conexion.php";
require "../classes/roles.php";
$rol = new roles;
session_start();
if(isset($_POST["nombre_rol"])){		
		$rol->insertar_roles($_POST["nombre_rol"], $conexion);	
}

?>