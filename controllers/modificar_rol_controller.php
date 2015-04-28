<?php
require "../conexion.php";
require "../classes/roles.php";
$rol = new roles;
session_start();
if(isset($_POST['id_rol'], $_POST["nombre_rol"])){		
		$rol->modificar_roles($_POST['id_rol'], $_POST["nombre_rol"], $conexion);	
}

?>