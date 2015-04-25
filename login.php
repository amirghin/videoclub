<?php 

require "conexion.php";
require "classes/usuarios_administradores.php";
$message = "";

if (isset($_POST['usuario'], $_POST['password'])){
	
	$usuario = new usuarios_administradores;
	$existencia = $usuario->existencia_usuario($_POST['usuario'], $conexion);
	$contrasenas_iguales = $usuario->validar_contrasena($_POST['usuario'], $_POST['password'], $conexion);
	if($existencia AND $contrasenas_iguales AND $usuario->habilitado==0){
		session_start();
		$_SESSION["usuario"] = $usuario->nom_usuario;
		$_SESSION["id_usuario"] = $usuario->id_usuario;
		$_SESSION["nombre_usuario"] = ucwords($usuario->nombre);
		header ("Location: pagina_inicio.php");

	} elseif($existencia AND $usuario->habilitado != 0) {
		$message = "El usuario se encuentra deshabilitado"; 

	} else {
		$message = "La combinación de usuario y contraseña es incorrecta";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Manejo de VideoClub</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>

<body>

	<section class="login_section">
		<div class="">
			<!--<h1>Iniciar Sesion</h1>	-->

		
			<form method="POST">	
				<fieldset class="login">
					<div class="filas">
					    <label for="usuario">Usuario:</label>
					    <input type="text" name="usuario" id="usuario" required>
				    </div>
				    <div class="filas">
				    	<label for="password">Contrase&ntilde;a:</label>
				    	<input type="password" name="password" id="password" required>
					</div>
					<div class="filas buttons">
				    	<input type="submit" value="Iniciar Sesion" class="button">
				    </div>
				    <p class="error"><?php echo $message?></p>

				</fieldset>
			</form>
		</div>
	</section>
</body>

</html>

