<?php

require "conexion.php";
require "classes/usuarios_administradores.php";

$usuario_administrador = new usuarios_administradores;

if(isset($_POST["nombre"], $_POST["apellido"], $_POST["nombre_usuario"], $_POST["contrasena"])){

	if (isset($_POST["habilitado"])){

		$habilitado = 1;

	}else{

		$habilitado = 0;
	}

	$usuario_administrador->insertar_usuario($_POST["nombre_usuario"], $_POST["nombre"], $_POST["apellido"], $_POST["contrasena"], $habilitado, $conexion);

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertar usuarios</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/videoclub.js"></script>

</head>
<body>
	<section class="estilos_form">
		<form method="POST" action="" id="insert_usuario_administrador">
			<fieldset>
				<div class="filas">
					<label for="nombre">Nombre: </label>
					<input type="text" name="nombre" required>
				</div>
				<div class="filas">
					<label for="apellido">Apellido: </label>
					<input type="text" name="apellido">
				</div>
				<div class="filas">
					<label for="nombre_usuario">Nombre de usuario: </label>
					<input type="text" name="nombre_usuario">
				</div>
				<div class="filas">
					<label for="contrasena">Contrase&ntilde;a: </label>
					<input type="password" name="contrasena" id="contrasena">
				</div>
				<div class="filas">
					<label for="conf_contrasena">Confirme la Contrase&ntilde;a: </label>
					<input type="password" name="conf_contrasena" id="conf_contrasena">
				</div>
				<div class="filas">
					<label for="habilitado">Habilitado: </label>
					<input type="checkbox" name="habilitado" checked>
				</div>
				<div class="filas">
				    <input type="button" value="Crear Usuario" class="button" id="crear_usuario">
				</div>
			</fieldset>
		</form>
	</section>
</body>
</html>