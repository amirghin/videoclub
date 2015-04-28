<?php

require "../classes/clientes.php";
require "../conexion.php";
session_start();
$cliente = new clientes;

if(isset($_POST["nombre_cliente"], $_POST["apellidos"], $_POST["email"], $_POST["fecha_nacimiento"], $_POST["tel_casa"], $_POST["tel_celular"], $_SESSION["id_usuario"])){

	$observaciones = "";
	if(isset($_POST["observaciones"])){

		$observaciones = $_POST["observaciones"];
	}

	$cliente->insertar_cliente($_POST["nombre_cliente"], $_POST["apellidos"], $_POST["email"], $_POST["fecha_nacimiento"], $_POST["tel_casa"], $_POST["tel_celular"], 
								$observaciones, $conexion, $_SESSION["id_usuario"]);
}





?>