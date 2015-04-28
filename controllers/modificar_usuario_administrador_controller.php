<?php

require "../conexion.php";
require "../classes/usuarios_administradores.php";
session_start();
$usuario_administrador = new usuarios_administradores;

if(isset($_POST["id_usuario"], $_POST["nombre"], $_POST["apellido"], $_POST["contrasena"], $_SESSION["id_usuario"])){
	$habilitado = 0;
	$encriptar = false;
	if (isset($_POST["habilitado"])){
		$habilitado = 1;
	}

	if(isset($_POST["encriptar"])){
		$encriptar = true;
	}

	$usuario_administrador->modificar_usuario($_POST["id_usuario"], $_POST["nombre"], $_POST["apellido"], 
											$_POST["contrasena"], $habilitado, $encriptar, $conexion, $_SESSION["id_usuario"]);
}
?>