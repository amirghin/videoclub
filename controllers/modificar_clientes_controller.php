<?php

require "../classes/clientes.php";
require "../conexion.php";

$cliente = new clientes;

if(isset($_POST["nombre_cliente"], $_POST["apellidos"], $_POST["email"], $_POST["fecha_nacimiento"], $_POST["tel_casa"], $_POST["tel_celular"], 
			$_POST["id_cliente"], $_POST["estado"])){

	$observaciones = "";
	$activo_web = 0;
	$estado = "inactivo";
	if(isset($_POST["observaciones"])){
		$observaciones = $_POST["observaciones"];
	}
	if(isset($_POST["activo_web"])){
		$activo_web = 1;
	}

	$cliente->modificar_cliente($_POST["nombre_cliente"], $_POST["apellidos"], $_POST["email"], $_POST["fecha_nacimiento"], $_POST["tel_casa"], $_POST["tel_celular"], $observaciones, $_POST["id_cliente"], $activo_web, $_POST["estado"], $conexion);
}
?>