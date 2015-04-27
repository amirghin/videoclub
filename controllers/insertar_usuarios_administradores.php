<?php

require "../conexion.php";
require "../classes/usuarios_administradores.php";

$usuario_administrador = new usuarios_administradores;

if(isset($_POST["nombre"], $_POST["apellido"], $_POST["nombre_usuario"], $_POST["contrasena"])){
	$habilitado = 0;
	
	if (isset($_POST["habilitado"])){
		$habilitado = 1;
	}

	$usuario_administrador->insertar_usuario($_POST["nombre_usuario"], $_POST["nombre"], $_POST["apellido"], $_POST["contrasena"], $habilitado, $conexion);
}
?>